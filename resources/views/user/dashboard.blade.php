@extends('user.layout.layout')
@section('page')
<div class="container-fluid topic">
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-dollar-sign  "></i>
                </div>
                <p>موجودی فعال شما
                    <span>
                                        <strong>700</strong> تتر
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-hands-helping  "></i>
                </div>
                <p>تعداد صرافی
                    <span>
                                        <strong>18</strong> مورد
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-shopping-bag  "></i>
                </div>
                <p>تعداد خرید فروش ها
                    <span>
                                        <strong>400</strong>
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-funnel-dollar  "></i>
                </div>
                <p> کل موجودی درگیر شده
                    <span>
                                        <strong>800.000.000</strong> تتر
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-chart-pie  "></i>
                </div>
                <p>میانگین سود
                    <span>
                                        <strong>48%</strong>
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-chart-line  "></i>
                </div>
                <p> سود کل
                    <span>
                                        <strong>2800</strong> تتر
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-percent  "></i>
                </div>
                <p> سهم شما(70%)
                    <span>
                                        <strong>2000</strong> تتر
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="fa fa-globe  "></i>
                </div>
                <p>پورسانت سایت (30%)
                    <span>
                                        <strong>800</strong> تتر
                                    </span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="feature-box">
                <div class="feature-title">
                    <i class="fa fa-square-full"></i>
                    <span>آمار سود ربات</span>
                </div>
                <div class="period-list">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            3 ماه گذشته
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item " href="#">3 ماه گذشته</a></li>
                            <li><a class="dropdown-item" href="#"> 6 ماه گذشته</a></li>
                            <li><a class="dropdown-item" href="#">  12 ماه گذشته</a></li>

                        </ul>
                    </div>
                    <script type="text/javascript">
                        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
                        var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                            return new bootstrap.Dropdown(dropdownToggleEl)
                        })
                    </script>
                </div>
                <div class="clearfix"></div>
                <div class="chart-box">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="summary">
                        <span class="">جمع کل سود:</span>
                        <span class=""><strong>3.2</strong>درصد</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="feature-box">
                <div class="feature-title">
                    <i class="fa fa-square-full"></i>
                    <span> آمار درامد من به دلار</span>
                </div>
                <div class="period-list">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            3 ماه گذشته
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item " href="#">3 ماه گذشته</a></li>
                            <li><a class="dropdown-item" href="#"> 6 ماه گذشته</a></li>
                            <li><a class="dropdown-item" href="#">  12 ماه گذشته</a></li>

                        </ul>
                    </div>
                    <script type="text/javascript">
                        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
                        var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                            return new bootstrap.Dropdown(dropdownToggleEl)
                        })
                    </script>
                </div>
                <div class="clearfix"></div>
                <div class="chart-box">
                    <div>
                        <canvas id="myChart1"></canvas>
                    </div>
                    <div class="summary">
                        <span class="">جمع کل درامد من:</span>
                        <span class=""><strong>802.000.000</strong>USDT</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="sectoin-title">
                <i class="fa fa-square-full"></i>
                <span>مقایسه قیمت ها </span>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box compare">
                <div class="float-left">
                    <h3>BTCUSDT</h3>
                    <span>بالاترین نرخ ارز</span>
                    <span class="highest"><strong>1.000.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="float-right">
                    <p>درصد سود
                        <span><i class="fa fa-sort-up"></i>3.2%</span>
                    </p>
                    <span>پایین ترین نرخ ارز</span>
                    <span class="lowest"><strong>800.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="feature-box compare">
                <div class="float-left">
                    <h3>BTCUSDT</h3>
                    <span>بالاترین نرخ ارز</span>
                    <span class="highest"><strong>1.000.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="float-right">
                    <p>درصد سود
                        <span><i class="fa fa-sort-up"></i>3.2%</span>
                    </p>
                    <span>پایین ترین نرخ ارز</span>
                    <span class="lowest"><strong>800.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12">
            <div class="feature-box compare">
                <div class="float-left">
                    <h3>BTCUSDT</h3>
                    <span>بالاترین نرخ ارز</span>
                    <span class="highest"><strong>1.000.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="float-right">
                    <p>درصد سود
                        <span><i class="fa fa-sort-up"></i>3.2%</span>
                    </p>
                    <span>پایین ترین نرخ ارز</span>
                    <span class="lowest"><strong>800.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12">
            <div class="feature-box compare">
                <div class="float-left">
                    <h3>BTCUSDT</h3>
                    <span>بالاترین نرخ ارز</span>
                    <span class="highest"><strong>1.000.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="float-right">
                    <p>درصد سود
                        <span><i class="fa fa-sort-up"></i>3.2%</span>
                    </p>
                    <span>پایین ترین نرخ ارز</span>
                    <span class="lowest"><strong>800.000</strong>USDT</span>
                    <span>نام صرافی اینجا</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="sectoin-title">
                <i class="fa fa-square-full"></i>
                <span>لیست معاملات اخیر</span>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12">
            <div class="table-box">
                <table border="0">
                    <tr>
                        <th>شناسه</th>
                        <th>رمز ارز</th>
                        <th>قیمت فروش</th>
                        <th>فروش به</th>
                        <th>قیمت خرید</th>
                        <th>خرید از</th>
                        <th>زمان </th>
                        <th>درصد سود</th>
                        <th>نتیجه</th>
                    </tr>
                    <tr class="light-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="grey-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="light-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="grey-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="light-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="grey-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="light-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                    <tr class="grey-color">
                        <td>#694414</td>
                        <td><i class="far fa-bitcoin"></i> بیت کوین (BTC)</td>
                        <td><strong>400</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td><strong>370</strong>تتر</td>
                        <td>اسم صرافی</td>
                        <td>1400/08/28</td>
                        <td>3.2%</td>
                        <td>موفق</td>
                    </tr>
                </table>
                <div class="pagination-box">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item "><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <span>تعداد صفحات<strong>11</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex align-items-center px-3 my-4" >
    <div class="squre shadow " ></div>
    <h3 class="h3-font" >نحوه عملکرد ربات ها</h3>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3" >
            <div id="accordion1" class=" accordion-style d-flex align-items-center justify-content-between mb-2 p-3 bg-body rounded-3 text-secondary" >
                <div id="number1" class=" number-style p-1 bg-light fs-3 p-2 text-center rounded-2 number" >01</div>
                <div>
                    <p class="pb-2" >مرحله اول</p>
                    <p>توضیح کوتاه در مورد مرحله</p>
                </div>
                <div> <i class="fas fa-chevron-left"></i> </div>
            </div>

            <div id="accordion2" class=" accordion-style d-flex align-items-center justify-content-between mb-2 p-3 bg-body rounded-3 text-secondary" >
                <div id="number2" class=" number-style p-1 bg-light fs-3 p-2 text-center rounded-2 number" >02</div>
                <div>
                    <p class="pb-2" >مرحله دوم</p>
                    <p>توضیح کوتاه در مورد مرحله</p>
                </div>
                <div> <i class="fas fa-chevron-left"></i> </div>
            </div>
            <div id="accordion3" class=" accordion-style d-flex align-items-center justify-content-between mb-2 p-3 bg-body rounded-3 text-secondary" >
                <div id="number3" class=" number-style p-1 bg-light fs-3 p-2 text-center rounded-2 number" >03</div>
                <div>
                    <p class="pb-2" >مرحله سوم</p>
                    <p>توضیح کوتاه در مورد مرحله</p>
                </div>
                <div> <i class="fas fa-chevron-left"></i> </div>
            </div>
            <div id="accordion4" class=" accordion-style d-flex align-items-center justify-content-between mb-2 p-3 bg-body rounded-3 text-secondary" >
                <div id="number4" class=" number-style p-1 bg-light fs-3 p-2 text-center rounded-2 number" >04</div>
                <div>
                    <p class="pb-2" >مرحله چهارم</p>
                    <p>توضیح کوتاه در مورد مرحله</p>
                </div>
                <div> <i class="fas fa-chevron-left"></i> </div>
            </div>
            <div id="accordion5" class=" accordion-style d-flex align-items-center justify-content-between mb-2 p-3 bg-body rounded-3 text-secondary" >
                <div id="number5" class=" number-style p-1 bg-light fs-3 p-2 text-center rounded-2 number" >05</div>
                <div>
                    <p class="pb-2" >مرحله پنجم</p>
                    <p>توضیح کوتاه در مورد مرحله</p>
                </div>
                <div> <i class="fas fa-chevron-left"></i> </div>
            </div>
        </div>



        <div class="col-md-9 position-relative" >
            <div id="p-text1" class=" activee text-style bg-body rounded-3 p-3" >
                <h3 class=" h3-style title-accordion fs-3 text-secondary py-3" >01 مرحله اول</h3>
                <p class=" p-text-style text-secondary lh-lg" >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل دستاوردهای  ی اصلی و جوابگوی سوالات پیوسته ا ی اصلی و جوابگوی سوالات پیوستهااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای  ااصلی و جوابگوی  ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اسوالات پیوسته اهل دنیای موجود طراحی اموجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>

            <div id="p-text2" class=" text-style bg-body rounded-3 p-3" >
                <h3 class=" h3-style title-accordion fs-3 text-secondary py-3" >02 مرحله دوم</h3>
                <p class=" p-text-style text-secondary lh-lg" >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل دستاوردهای  ی اصلی و جوابگوی سوالات پیوسته ا ی اصلی و جوابگوی سوالات پیوستهااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای  ااصلی و جوابگوی  ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اسوالات پیوسته اهل دنیای موجود طراحی اموجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>
            <div id="p-text3" class=" text-style bg-body rounded-3 p-3" >
                <h3 class=" h3-style title-accordion fs-3 text-secondary py-3" >03 مرحله سوم</h3>
                <p class=" p-text-style text-secondary lh-lg" >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل دستاوردهای  ی اصلی و جوابگوی سوالات پیوسته ا ی اصلی و جوابگوی سوالات پیوستهااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای  ااصلی و جوابگوی  ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اسوالات پیوسته اهل دنیای موجود طراحی اموجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>
            <div id="p-text4" class=" text-style bg-body rounded-3 p-3" >
                <h3 class=" h3-style title-accordion fs-3 text-secondary py-3" >04 مرحله چهارم</h3>
                <p class="p-text-style text-secondary lh-lg" >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل دستاوردهای  ی اصلی و جوابگوی سوالات پیوسته ا ی اصلی و جوابگوی سوالات پیوستهااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای  ااصلی و جوابگوی  ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اسوالات پیوسته اهل دنیای موجود طراحی اموجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>
            <div id="p-text5" class=" text-style bg-body rounded-3 p-3" >
                <h3 class=" h3-style title-accordion fs-3 text-secondary py-3" >05 مرحله پنجم</h3>
                <p class=" p-text-style text-secondary lh-lg" >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل  تاوردهای اصلی و جوابگوی سوالات پیوسته اهل دستاوردهای  ی اصلی و جوابگوی سوالات پیوسته ا ی اصلی و جوابگوی سوالات پیوستهااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی ا ا ااصلی و جوابگوی سوالات پیوسته اهل دنیای  ااصلی و جوابگوی  ااصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اسوالات پیوسته اهل دنیای موجود طراحی اموجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>
        </div>
    </div>
</div>
@endsection
