var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  loop: false,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    960: {
      slidesPerView: 3,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // pagination: {
  //   el: ".swiper-pagination",
  //   clickable: true,
  // },
});


//  ------
//  スライダーのボタン（戻る・進むボタンをスライダーの外に設置するための指定）
//  -------
// WORKSのスライダーの処理
let worksPrev = document.getElementById('works-prev');
let worksPrevFake = document.getElementById('works-prev--fake');
let worksNext = document.getElementById('works-next');
let worksNextFake = document.getElementById('works-next--fake');

bothButtonPassivate(worksPrev, worksPrevFake, worksNext, worksNextFake);

worksPrevFake.addEventListener('click', () => {
  worksPrev.click();
  bothButtonPassivate(worksPrev, worksPrevFake, worksNext, worksNextFake);
});

worksNextFake.addEventListener('click', () => {
  worksNext.click();
  bothButtonPassivate(worksPrev, worksPrevFake, worksNext, worksNextFake);
});


// BLOGのスライダーの処理
let blogNext = document.getElementById('blog-next');
let blogNextFake = document.getElementById('blog-next--fake');
let blogPrev = document.getElementById('blog-prev');
let blogPrevFake = document.getElementById('blog-prev--fake');

bothButtonPassivate(blogNext, blogNextFake, blogPrev, blogPrevFake);

blogPrevFake.addEventListener('click', () => {
  blogPrev.click();
  bothButtonPassivate(blogNext, blogNextFake, blogPrev, blogPrevFake);
});

blogNextFake.addEventListener('click', () => {
  blogNext.click();
  bothButtonPassivate(blogNext, blogNextFake, blogPrev, blogPrevFake);
});


// 矢印の無効化の関数
function buttonPassivate(genuineButton, fakeButton) {
  if (genuineButton.getAttribute('aria-disabled') === 'true') {
    fakeButton.classList.add('is-passive');
  } else {
    fakeButton.classList.remove('is-passive');
  }
}

function bothButtonPassivate(prevGenuineButton, prevFakeButton, nextGenuineButton, nextFakeButton) {
  buttonPassivate(prevGenuineButton, prevFakeButton);
  buttonPassivate(nextGenuineButton, nextFakeButton);
}
