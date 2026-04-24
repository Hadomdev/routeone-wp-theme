const ArticleNavHandler = () => {
  const pageMain = document.querySelector('.page__main');
  const singleArticleNav = pageMain.querySelector('.single-article__nav');

  if (pageMain && singleArticleNav) {
    pageMain.classList.add('overflow-visible');
  }
}

export default ArticleNavHandler;