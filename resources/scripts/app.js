import domReady from '@roots/sage/client/dom-ready';
import { onStart } from './custom';
/**
 * Application entrypoint
 */
domReady(async () => {
    onStart();
    // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
