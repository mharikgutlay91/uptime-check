function pingWebsite(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.timeout = 5000; // Set a timeout in milliseconds

    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        resolve({ status: xhr.status, message: url + ' Website is up!' });
      } else {
        reject({ status: xhr.status, message: 'Website returned an error status.' });
      }
    };

    xhr.onerror = function () {
      reject({ status: 0, message: 'Network error or website is unreachable.' });
    };

    xhr.ontimeout = function () {
      reject({ status: 0, message: 'Request timed out.' });
    };

    xhr.send();
  });
}

// async function pingWebsiteFetch(url) {
//   try {
//     const response = await fetch(url, { method: 'GET', mode: 'no-cors' }); // 'no-cors' for cross-origin requests
//     if (response.ok || response.type === 'opaque') { // 'opaque' for no-cors responses
//       return { status: response.status, message: 'Website is up!' };
//     } else {
//       return { status: response.status, message: 'Website returned an error status.' };
//     }
//   } catch (error) {
//     return { status: 0, message: 'Network error or website is unreachable.' };
//   }
// }

function checkWebsiteLive(site) {
  pingWebsite(site)
    .then(response => {
      console.log(`Success: ${response.message} (Status: ${response.status})`);
    })
    .catch(error => {
      console.error(`Error: ${error.message} (Status: ${error.status})`);
    });
}