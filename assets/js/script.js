// ------ グローバルナビゲーション -------
let gnavBtn = document.getElementById('global-nav-button');
let menuBody = gnavBtn.nextElementSibling;
let gnavItems = document.querySelectorAll('.global-nav__link');

gnavBtn.addEventListener('click', (e) => {
  e.currentTarget.classList.toggle('is-active');
  menuBody.classList.toggle('is-visible');
});

gnavItems.forEach(item => {
  item.addEventListener('click', () => {
    gnavBtn.classList.toggle('is-active');
    menuBody.classList.toggle('is-visible');
  });
});


// ------ 『トップへ戻る」ボタンの表示・非表示 -------
let gobackTop = document.getElementById('goback-top');
let activateHeight = 300;
window.addEventListener('scroll', () => {
  if (window.pageYOffset >= activateHeight) {
    gobackTop.classList.add('is-active');
  } else {
    gobackTop.classList.remove('is-active');
  }
});

// ------ スムーススクロール -------
const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');
for (let i = 0; i < smoothScrollTrigger.length; i++){
  smoothScrollTrigger[i].addEventListener('click', (e) => {
    e.preventDefault();
    let href = smoothScrollTrigger[i].getAttribute('href');
      let targetElement = document.getElementById(href.replace('#', ''));
    const rect = targetElement.getBoundingClientRect().top;
    const offset = window.pageYOffset;
    const gap = 60;
    const target = rect + offset - gap;
    window.scrollTo({
      top: target,
      behavior: 'smooth',
    });
  });
}


// ------ 検索フォームの開閉 -------
document.addEventListener('click', e => {

  let targetForm = e.target.closest('.search-form');

  if (targetForm) {

    targetForm.classList.add('is-active');
    targetForm.querySelector('.search-form__search').focus();

  } else {

    let searchForms = document.querySelectorAll('.search-form');
    searchForms.forEach(form => {
      form.classList.remove('is-active');
    })

  }
})
