import path from 'path';
import fs from 'fs';
import { glob } from 'glob';
import { src, dest, watch, series } from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import terser from 'gulp-terser';
import sharp from 'sharp';
import webp from 'gulp-webp';
import notify from 'gulp-notify';

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    images: {
        src: 'src/img/**/*.{png,jpg,svg}',
        dest: 'public/build/img'
    }
};

// Compile SCSS to CSS
export function css(done) {
    src(paths.scss, { sourcemaps: true })
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(dest('./public/build/css', { sourcemaps: '.' }));
    done();
}

// Minify JavaScript
export function js(done) {
    src(paths.js)
        .pipe(terser())
        .pipe(dest('./public/build/js'));
    done();
}

// Convert images to WebP
export const convertToWebp = () => {
    return src(paths.images.src)
        .pipe(webp().on('error', (err) => {
            console.error('Error in convertToWebp task', err.toString());
        }))
        .pipe(dest(paths.images.dest))
        .pipe(notify({ message: 'Images converted to WebP', onLast: true }));
};

// Process images: create JPG, WebP, and AVIF versions
export async function imagenes(done) {
    const srcDir = './src/img';
    const buildDir = './public/build/img';
    const images = await glob('./src/img/**/*');

    for (const file of images) {
        const relativePath = path.relative(srcDir, path.dirname(file));
        const outputSubDir = path.join(buildDir, relativePath);
        await procesarImagenes(file, outputSubDir);
    }
    done();
}

// Helper function to process each image
async function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true });
    }
    const baseName = path.basename(file, path.extname(file));
    const extName = path.extname(file).toLowerCase();

    if (extName === '.svg') {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        fs.copyFileSync(file, outputFile);
    } else {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`);
        const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`);
        const options = { quality: 80 };

        try {
            await sharp(file).jpeg(options).toFile(outputFile);
            await sharp(file).webp(options).toFile(outputFileWebp);
            await sharp(file).avif().toFile(outputFileAvif);
        } catch (error) {
            console.error('Error processing image:', file, error);
        }
    }
}

// Watch for changes
export function gulp() {
    watch(paths.scss, css);
    watch(paths.js, js);
    watch(paths.images.src, series(imagenes, convertToWebp));
}

// Default task
export default series(js, css, imagenes, convertToWebp, gulp);

