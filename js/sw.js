var CACHE_NAME = 'example';
var urlsToCache = [
  '/index.php',
 '/css/style.css',
 '/css/normalize.css',
 '/rundgang_1.php',
 '/rundgang_2.php',
 '/about.php',
 '/alert.php',
 '/artikelErfassen.php',
 '/footer.php',
 '/footerloggout.php',
 '/header.php',
 '/headerarrow.php',
 '/help.php',
 '/home-uebersicht.php',
 '/impressum.php',
 '/login-wall.php',
 'login.php',
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
        return fetch(event.request);
      }
    )
  );
});

self.addEventListener('activate', function(event) {
  var cacheWhitelist = ['example'];
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
