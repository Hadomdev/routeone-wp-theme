# Front-end build (assets)

Webpack pipeline that compiles SCSS, JS and copies static assets (fonts, favicons, images) into `dist/`.

## Installation and build

```sh
npm install --force
npm run start   # development build with watch
npm run build   # production build (writes to ./dist/)
```

## Notes

- Static HTML mockups (`src/html/`) were excluded from the public repo because they contained client-specific page copy. The webpack config tolerates a missing `src/html/views` folder.
- Compiled output (`dist/`) is generated locally and is not committed.
