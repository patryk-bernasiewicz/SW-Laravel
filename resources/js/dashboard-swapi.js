window.addEventListener('load', function () {
  let loader, loading;

  const showLoader = (show = false, parent) => {
    loading = !!show;
    if (!loader) {
      loader = document.createElement('img');
      loader.src = '/img/spinner.svg';
      loader.alt = 'Loading...';
      loader.classList.add('w-16', 'h-16', 'ml-4');
      if (!show) {
        loader.classList.add('hidden');
      }
      loader.style = 'margin: -.75em 0;';

      parent.insertAdjacentElement('afterend', loader);
    } else {
      if (show) {
        loader.classList.remove('hidden');
      } else {
        loader.classList.add('hidden');
      }
    }
  }

  const refreshBtn = document.querySelector('#swapi_refresh');
  refreshBtn.addEventListener('click', e => {
    if (loading) return;

    showLoader(true, e.target);

    fetch('/dashboard/swapi/refresh', {
      cache: 'no-cache',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    })
      .then(res => res.json())
      .then(res => {
        setTimeout(() => {
          console.log('Success!', res);
          showLoader(false, e.target);
        }, 3000);
      })
      .catch(err => {
        console.error('Error!', err);
        showLoader(false, e.target);
      });
  });
});