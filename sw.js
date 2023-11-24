const CACHE_NAME = 'Sistema_Checador_PWA'

//Agregar los archivos y carpetas
var urlIsToCache = [
    './',
    'main.js',
    'sw.js',
    'IMG/logob.png',
    'IMG/logoSitio.png',
    'IMG/logo_res.png',
    'IMG/logo COBACH.png',
    'js/plugins.js',
    'js/MostrarDatos.js',
    'js/Movimientos.js',
    'css/bootstrap.min.css',
    'css/Movimientos.css',
    'css/templatemo-style.css',
    'fontawesome/css/all.min.css',
    'fontawesome/attribution.js',
    'fontawesome/LICENSE.txt',
    'fontawesome/no fun.php',
    'fontawesome/webfonts/fa-brands-400.eot',
    'fontawesome/webfonts/fa-brands-400.svg',
    'fontawesome/webfonts/fa-solid-900.woff2',
    'fontawesome/webfonts/fa-solid-900.woff',
    'fontawesome/webfonts/fa-solid-900.ttf',
    'fontawesome/webfonts/fa-brands-400.ttf',
    'fontawesome/webfonts/fa-brands-400.woff',
    'fontawesome/webfonts/fa-brands-400.woff2',
    'fontawesome/webfonts/fa-regular-400.eot',
    'fontawesome/webfonts/fa-regular-400.svg',
    'fontawesome/webfonts/fa-regular-400.ttf',
    'fontawesome/webfonts/fa-regular-400.woff',
    'fontawesome/webfonts/fa-regular-400.woff2',
    'fontawesome/webfonts/fa-solid-900.eot',
    'fontawesome/webfonts/fa-solid-900.svg',
    'PHP/AgregarRegistros.php',
    'PHP/CargarArchivo.php',
    'PHP/CerrarSecion.php',
    'PHP/conexion.php',
    'PHP/InicioSecion.php',
    'PHP/MuestraChecadas.php',
    'PHP/PreCarga.php',
    'PHP/Roles.php',
    'VISTAS/Cargas.php',
    'VISTAS/Home.php',
    'Templete/css/bootstrap-grid.css',
    'Templete/css/bootstrap-grid.min.css',
    'Templete/css/bootstrap-reboot.css',
    'Templete/css/bootstrap-reboot.min.css',
    'Templete/css/bootstrap.css',
    'Templete/css/bootstrap.min.css',
    'Templete/css/style.css',
    'Templete/css/style.min.css',
    'Templete/js/main.js',
    'Templete/scss/style.scss',
    'Templete/scss/bootstrap/scss/_alert.scss',
    'Templete/scss/bootstrap/scss/_badge.scss',
    'Templete/scss/bootstrap/scss/_breadcrumb.scss',
    'Templete/scss/bootstrap/scss/_button-group.scss',
    'Templete/scss/bootstrap/scss/_buttons.scss',
    'Templete/scss/bootstrap/scss/_card.scss',
    'Templete/scss/bootstrap/scss/_carousel.scss',
    'Templete/scss/bootstrap/scss/_close.scss',
    'Templete/scss/bootstrap/scss/_code.scss',
    'Templete/scss/bootstrap/scss/_custom-forms.scss',
    'Templete/scss/bootstrap/scss/_dropdown.scss',
    'Templete/scss/bootstrap/scss/_forms.scss',
    'Templete/scss/bootstrap/scss/_functions.scss',
    'Templete/scss/bootstrap/scss/_grid.scss',
    'Templete/scss/bootstrap/scss/_images.scss',
    'Templete/scss/bootstrap/scss/_input-group.scss',
    'Templete/scss/bootstrap/scss/_jumbotron.scss',
    'Templete/scss/bootstrap/scss/_list-group.scss',
    'Templete/scss/bootstrap/scss/_media.scss',
    'Templete/scss/bootstrap/scss/_mixins.scss',
    'Templete/scss/bootstrap/scss/_modal.scss',
    'Templete/scss/bootstrap/scss/_nav.scss',
    'Templete/scss/bootstrap/scss/_navbar.scss',
    'Templete/scss/bootstrap/scss/_pagination.scss',
    'Templete/scss/bootstrap/scss/_popover.scss',
    'Templete/scss/bootstrap/scss/_print.scss',
    'Templete/scss/bootstrap/scss/_progress.scss',
    'Templete/scss/bootstrap/scss/_reboot.scss',
    'Templete/scss/bootstrap/scss/_root.scss',
    'Templete/scss/bootstrap/scss/_spinners.scss',
    'Templete/scss/bootstrap/scss/_tables.scss',
    'Templete/scss/bootstrap/scss/_toasts.scss',
    'Templete/scss/bootstrap/scss/_tooltip.scss',
    'Templete/scss/bootstrap/scss/_transitions.scss',
    'Templete/scss/bootstrap/scss/_type.scss',
    'Templete/scss/bootstrap/scss/_utilities.scss',
    'Templete/scss/bootstrap/scss/_variables.scss',
    'Templete/scss/bootstrap/scss/bootstrap-grid.scss',
    'Templete/scss/bootstrap/scss/bootstrap-reboot.scss',
    'Templete/scss/bootstrap/scss/bootstrap.scss',
    'Templete/scss/bootstrap/scss/mixins/_alert.scss',
    'Templete/scss/bootstrap/scss/mixins/_background-variant.scss',
    'Templete/scss/bootstrap/scss/mixins/_badge.scss',
    'Templete/scss/bootstrap/scss/mixins/_border-radius.scss',
    'Templete/scss/bootstrap/scss/mixins/_box-shadow.scss',
    'Templete/scss/bootstrap/scss/mixins/_breakpoints.scss',
    'Templete/scss/bootstrap/scss/mixins/_buttons.scss',
    'Templete/scss/bootstrap/scss/mixins/_caret.scss',
    'Templete/scss/bootstrap/scss/mixins/_clearfix.scss',
    'Templete/scss/bootstrap/scss/mixins/_deprecate.scss',
    'Templete/scss/bootstrap/scss/mixins/_float.scss',
    'Templete/scss/bootstrap/scss/mixins/_forms.scss',
    'Templete/scss/bootstrap/scss/mixins/_gradients.scss',
    'Templete/scss/bootstrap/scss/mixins/_grid-framework.scss',
    'Templete/scss/bootstrap/scss/mixins/_grid.scss',
    'Templete/scss/bootstrap/scss/mixins/_hover.scss',
    'Templete/scss/bootstrap/scss/mixins/_image.scss',
    'Templete/scss/bootstrap/scss/mixins/_list-group.scss',
    'Templete/scss/bootstrap/scss/mixins/_lists.scss',
    'Templete/scss/bootstrap/scss/mixins/_nav-divider.scss',
    'Templete/scss/bootstrap/scss/mixins/_pagination.scss',
    'Templete/scss/bootstrap/scss/mixins/_reset-text.scss',
    'Templete/scss/bootstrap/scss/mixins/_resize.scss',
    'Templete/scss/bootstrap/scss/mixins/_screen-reader.scss',
    'Templete/scss/bootstrap/scss/mixins/_size.scss',
    'Templete/scss/bootstrap/scss/mixins/_table-row.scss',
    'Templete/scss/bootstrap/scss/mixins/_text-emphasis.scss',
    'Templete/scss/bootstrap/scss/mixins/_text-hide.scss',
    'Templete/scss/bootstrap/scss/mixins/_text-truncate.scss',
    'Templete/scss/bootstrap/scss/mixins/_transition.scss',
    'Templete/scss/bootstrap/scss/mixins/_visibility.scss',
    'Templete/scss/bootstrap/scss/utilities/_align.scss',
    'Templete/scss/bootstrap/scss/utilities/_background.scss',
    'Templete/scss/bootstrap/scss/utilities/_borders.scss',
    'Templete/scss/bootstrap/scss/utilities/_clearfix.scss',
    'Templete/scss/bootstrap/scss/utilities/_display.scss',
    'Templete/scss/bootstrap/scss/utilities/_embed.scss',
    'Templete/scss/bootstrap/scss/utilities/_flex.scss',
    'Templete/scss/bootstrap/scss/utilities/_float.scss',
    'Templete/scss/bootstrap/scss/utilities/_interactions.scss',
    'Templete/scss/bootstrap/scss/utilities/_overflow.scss',
    'Templete/scss/bootstrap/scss/utilities/_position.scss',
    'Templete/scss/bootstrap/scss/utilities/_screenreaders.scss',
    'Templete/scss/bootstrap/scss/utilities/_shadows.scss',
    'Templete/scss/bootstrap/scss/utilities/_sizing.scss',
    'Templete/scss/bootstrap/scss/utilities/_spacing.scss',
    'Templete/scss/bootstrap/scss/utilities/_stretched-link.scss',
    'Templete/scss/bootstrap/scss/utilities/_text.scss',
    'Templete/scss/bootstrap/scss/utilities/_visibility.scss',
    'Templete/scss/bootstrap/scss/vendor/_rfs.scss',

]

//Instala el service worker 
self.addEventListener('install', e=> {
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache => {
            return cache.addAll(urlIsToCache)
            .then(() => {
                self.skipWaiting()
            })

            .catch(err => {
                console.log('No se registro el cache', err);
            })
        })
    )
})

self.addEventListener('activate', e=>{
    const cacheWhiteList = [CACHE_NAME]
    e.waitUntil(
        caches.keys()
        .then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName =>{
                    if(cacheWhiteList.indexOf(cacheName) === -1){
                        //Borrar elementos que no se necesitan
                        return caches.delete(cacheName);
                    }
                })
            );
        })
        .then(() => {self.clients.claim();})
    );
})

self.addEventListener
('fetch', e =>{
    e.respondWith(
        caches.match(e.request)
        .then(res=>{
            if(res){
                return res;
            }
            return fetch(e.request);
        })
    );
});