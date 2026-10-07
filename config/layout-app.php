  @php
  $siteName = config('app.name', 'Bedding Atelier');

  $pageTitle = isset($title) && filled($title)
  ? $title
  : 'Постельное бельё на заказ';

  $pageDescription = isset($description) && filled($description)
  ? $description
  : 'Пошив постельного белья из турецкого хлопка на заказ. '
  . 'Индивидуальные размеры, качественные ткани и доставка.';

  /*
  * request()->url() возвращает текущий URL
  * без query-параметров.
  */
  $canonical = request()->url();