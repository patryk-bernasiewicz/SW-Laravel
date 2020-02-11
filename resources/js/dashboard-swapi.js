window.addEventListener('load', function () {
  let loader, infoBox, loading;

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
  };

  const showInfoBox = (text, show = true, parent) => {
    if (!infoBox) {
      infoBox = document.createElement('div');
      infoBox.classList.add('mt-2', 'mb-1', 'text-green-500');
      parent.insertAdjacentElement('beforebegin', infoBox);
    }
    if (show) {
      infoBox.classList.remove('hidden');
    } else {
      infoBox.classList.add('hidden');
    }
    infoBox.innerText = text;
  };

  const refreshBtn = document.querySelector('#swapi_refresh');
  refreshBtn.addEventListener('click', e => {
    if (loading) return;

    showLoader(true, e.target);
    e.target.setAttribute('disabled', 'disabled');

    showInfoBox('Working! Please do not refresh the browser and do not close the window.', true, e.target.parentElement);

    fetch('/dashboard/swapi/refresh', {
      cache: 'no-cache',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    })
      .then(res => res.json())
      .then(res => {
        showLoader(false, e.target);
        showInfoBox(res.message)
        e.target.removeAttribute('disabled', 'disabled');
      })
      .catch(err => {
        showLoader(false, e.target);
        showInfoBox(err.message);
        e.target.removeAttribute('disabled', 'disabled');
      });
  });
});