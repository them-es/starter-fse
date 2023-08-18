## them.es Starter Full Site Editing (FSE) Theme

**them.es Starter** is a WordPress Starter Theme built for the new Full Site Editing experience. Please note that the Source files are only recommended for WordPress Developers who are searching for a simple, solid, proved and tested **Full Site Editing Starter Theme** to build upon. **_Don't_ expect a ready-to-use WordPress Theme!**

If you want to see it in action or want to download a customized Theme for free, check out [https://them.es/starter-fse](https://them.es/starter-fse)

## What's included?

- WordPress Theme
- Full Site Editing configuration: Templates, Template parts, theme.json and Sass Source files
- webpack configuration
- 2 Menus

## Task Automation

This Theme comes with a built in webpack task automation. Sass files will be compiled if changed, vendor prefixes will be added automatically and the CSS will be minified. JS source files will be bundled and minified.

- Prerequisites: [Node.js](https://nodejs.org) (NPM) needs to be installed on your system
- Open the **Project directory** `/` in Terminal and install the required Node.js dependencies: webpack, Sass-Compiler, Autoprefixer, etc.
- `$ npm install`
- Run the **`watch`** script
- `$ npm run watch`
- Modify `/theme.json` (Global settings for the block editor including the CSS variables), `/assets/main.scss` and `/assets/main.js`

* Test the Theme
* Run the **`build`** script
* `$ npm run build`

## (Optional) Include blocks in the theme

- Download or fork [WordPress Blocks Starter](https://github.com/them-es/wordpress-blocks-starter)
- Reference it via `functions.php` as described in [Setup](https://github.com/them-es/wordpress-blocks-starter#setup)
- Build your custom blocks

## Technology

- [Sass](https://github.com/sass/sass), [MIT license](https://github.com/sass/sass/blob/stable/MIT-LICENSE)
- [webpack](https://github.com/webpack/webpack), [MIT license](https://github.com/webpack/webpack/blob/master/LICENSE)
- [@wordpress/scripts](https://github.com/WordPress/gutenberg/tree/trunk/packages/scripts), [GPLv2+ and Mozilla Public License v2.0](https://github.com/WordPress/gutenberg/blob/trunk/LICENSE.md)

## Copyright & License

Code and Documentation &copy; [them.es](https://them.es)

Code released under [GPLv2+](https://www.gnu.org/licenses/gpl-2.0.html)
