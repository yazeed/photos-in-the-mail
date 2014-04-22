@extends('layout')

@section('content')
<section id="content">
    <div class="c1">
            <div class="c3">
                <div class="c2">
                    <div class="holder">
                        <header class="headline">
                            <h1>Open Your Photos in the Mail, Every Month</h1>
                            <span>Photos from your phone-printed and mailed to your door</span>
                        </header>
                        <div class="three-columns plans">
                            <article class="column" data-plan="package">
                                <div class="pricing">
                                    <header class="heading">
                                        <h2 class="name">Package</h2>
                                        <span class="monthly-rate">
                                            <sub>Monthly</sub><sup>$</sup><span class="num">2</span>
                                        </span>
                                    </header>
                                        <div class="text-wrapper">
                                            <p>For just two dollars a month, we'll send you <strong>5 photos in the mail,</strong> giving you a record of those special moments.</p>
                                        </div>
                                    <div class="photos-num">
                                        <div class="img-wrap">
                                            <img class="main-img" src="{{ URL::asset('/assets/images/icon01.png') }}" width="73" height="45" alt="icon">
                                            <img class="active-img" src="{{ URL::asset('/assets/images/icon01-active.png') }}" width="73" height="45" alt="icon">
                                        </div>
                                        <span> x <em class="num">5</em></span>
                                    </div>
                                    <div class="btns">
                                        <a href="#" class="btn-select">Select &gt;</a>
                                        <a href="#popup4" class="btn-plan lightbox">Your Plan</a>
                                    </div>
                                </div>
                                <ul class="facts">
                                    <li>5 high-quality photos each month</li>
                                    <li>You choose 'em, we print 'em</li>
                                    <li>Picture frame quality photos</li>
                                    <li>Costs less than a cup of coffee</li>
                                </ul>
                                <a href="#popup1" class="howit-works lightbox">How it works &gt;</a>
                                <!-- contain lightbox -->
                                <div class="popup-holder">
                                    <div id="popup1" class="lightbox">
                                        <header class="heading">
                                            <h2>How do you get Photos in the Mail?</h2>
                                            <p>Getting your Photos in the Mail is easy: Choose a plan, send us your details, and start taking photos. Soon you'll be opening Photos in the Mail, delivered right to your mailbox.</p>
                                        </header>
                                        <ol class="list">
                                            <li>
                                                <strong class="title"> Choose Your Plan</strong>
                                                <p>Don’t worry, you can switch at any time:</p>
                                                <ul>
                                                    <li>
                                                        <strong class="price">$2<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x5</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$5<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x15</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$7<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x25</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="even">
                                                <strong class="title">Easy Signup</strong>
                                                <p>Take just a couple of minutes to sign up online, with no contracts or ongoing obligations.</p>
                                                <a href="#" class="secure">Secure</a>
                                            </li>
                                            <li class="upload-photo">
                                                <strong class="title">Email Your Photos</strong>
                                                <p>Simply send your photos to <a href="mailto:photos@photosinthemail.com">this email</a> each month.</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                            <li class="even photo-mail">
                                                <strong class="title">Photos in the Mail</strong>
                                                <p>You’ll recieve your photos within 10 days!</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                        </ol>
                                        <a href="#" class="close">Close X</a>
                                        <a href="#" class="go-back">&lt; Go back to Pricing page</a>
                                    </div>
                                </div>
                            </article>
                            <article class="column" data-plan="collection">
                                <div class="pricing">
                                    <header class="heading">
                                        <h2 class="name">Collection</h2>
                                        <span class="monthly-rate">
                                            <sub>Monthly</sub><sup>$</sup><span class="num">6</span>
                                        </span>
                                    </header>
                                    <div class="text-wrapper">
                                        <p>For six dollars a month, we'll send you <strong>15 photos in the mail,</strong> so you can keep every moment that matters</p>
                                    </div>
                                    <div class="photos-num">
                                        <div class="img-wrap">
                                            <img class="main-img" src="{{ URL::asset('/assets/images/icon01.png') }}" width="73" height="45" alt="icon">
                                            <img class="active-img" src="{{ URL::asset('/assets/images/icon01-active.png') }}" width="73" height="45" alt="icon">
                                        </div>
                                        <span> x <em class="num">15</em></span>
                                    </div>
                                    <div class="btns">
                                        <a href="#" class="btn-select">Select &gt;</a>
                                        <a href="#popup4" class="btn-plan lightbox">Your Plan</a>
                                    </div>
                                </div>
                                <ul class="facts">
                                    <li>15 high-quality photos each month</li>
                                    <li>You choose 'em, we print 'em</li>
                                    <li>Picture frame quality photos</li>
                                    <li><strong>Free shipping</strong></li>
                                    <li>Keep your important moments</li>
                                </ul>
                                <a href="#popup2" class="howit-works lightbox">How it works &gt;</a>
                                <!-- contain lightbox -->
                                <div class="popup-holder">
                                    <div id="popup2" class="lightbox">
                                        <header class="heading">
                                            <h2>How do you get Photos in the Mail?</h2>
                                            <p>Getting your Photos in the Mail is easy: Choose a plan, send us your details, and start taking photos. Soon you'll be opening Photos in the Mail, delivered right to your mailbox.</p>
                                        </header>
                                        <ol class="list">
                                            <li>
                                                <strong class="title"> Choose Your Plan</strong>
                                                <p>Don’t worry, you can switch at any time:</p>
                                                <ul>
                                                    <li>
                                                        <strong class="price">$2<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x5</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$5<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x15</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$7<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x25</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="even">
                                                <strong class="title">Easy Signup</strong>
                                                <p>Take just a couple of minutes to sign up online, with no contracts or ongoing obligations.</p>
                                                <a href="#" class="secure">Secure</a>
                                            </li>
                                            <li class="upload-photo">
                                                <strong class="title">Email Your Photos</strong>
                                                <p>Simply send your photos to <a href="mailto:photos@photosinthemail.com">this email</a> each month.</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                            <li class="even photo-mail">
                                                <strong class="title">Photos in the Mail</strong>
                                                <p>You’ll recieve your photos within 10 days!</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                        </ol>
                                        <a href="#" class="close">Close X</a>
                                        <a href="#" class="go-back">&lt; Go back to Pricing page</a>
                                    </div>
                                </div>
                            </article>
                            <article class="column last" data-plan="album">
                                <div class="pricing">
                                    <header class="heading">
                                        <h2 class="name">Album</h2>
                                        <span class="monthly-rate">
                                            <sub>Monthly</sub><sup>$</sup><span class="num">9</span>
                                        </span>
                                    </header>
                                        <div class="text-wrapper">
                                            <p>For nine dollars a month, we'll send you <strong>25 real photos in the mail</strong>, enough to share with all your friends (&amp; your granny).</p>
                                        </div>
                                    <div class="photos-num">
                                        <div class="img-wrap">
                                            <img class="main-img" src="{{ URL::asset('/assets/images/icon01.png') }}" width="73" height="45" alt="icon">
                                            <img class="active-img" src="{{ URL::asset('/assets/images/icon01-active.png') }}" width="73" height="45" alt="icon">
                                        </div>
                                        <span> x <em class="num">25</em></span>
                                    </div>
                                    <div class="btns">
                                        <a href="#" class="btn-select">Select &gt;</a>
                                        <a href="#popup4" class="btn-plan lightbox">Your Plan</a>
                                    </div>
                                </div>
                                <ul class="facts">
                                    <li>25 high-quality photos each month</li>
                                    <li>You choose 'em, we print 'em</li>
                                    <li>Picture frame quality photos</li>
                                    <li><strong>Free shipping</strong></li>
                                    <li>Keep your important moments</li>
                                    <li>Build an album or share with friends</li>
                                </ul>
                                <a href="#popup3" class="howit-works lightbox">How it works &gt;</a>
                                <!-- contain lightbox -->
                                <div class="popup-holder">
                                    <div id="popup3" class="lightbox">
                                        <header class="heading">
                                            <h2>How do you get Photos in the Mail?</h2>
                                            <p>Getting your Photos in the Mail is easy: Choose a plan, send us your details, and start taking photos. Soon you'll be opening Photos in the Mail, delivered right to your mailbox.</p>
                                        </header>
                                        <ol class="list">
                                            <li>
                                                <strong class="title"> Choose Your Plan</strong>
                                                <p>Don’t worry, you can switch at any time:</p>
                                                <ul>
                                                    <li>
                                                        <strong class="price">$2<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x5</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$5<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x15</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <strong class="price">$7<span>/mo</span></strong>
                                                        <div class="photo-no">
                                                            <span>x25</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="even">
                                                <strong class="title">Easy Signup</strong>
                                                <p>Take just a couple of minutes to sign up online, with no contracts or ongoing obligations.</p>
                                                <a href="#" class="secure">Secure</a>
                                            </li>
                                            <li class="upload-photo">
                                                <strong class="title">Email Your Photos</strong>
                                                <p>Simply send your photos to <a href="mailto:photos@photosinthemail.com">this email</a> each month.</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                            <li class="even photo-mail">
                                                <strong class="title">Photos in the Mail</strong>
                                                <p>You’ll recieve your photos within 10 days!</p>
                                                <span class="bg-wrap"></span>
                                            </li>
                                        </ol>
                                        <a href="#" class="close">Close X</a>
                                        <a href="#" class="go-back">&lt; Go back to Pricing page</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holder add">
            <section class="faq-block">
                <h2>Frequently Asked Questions</h2>
                <article class="article">
                    <h3>What is the cancellation policy?</h3>
                    <p>Our cancellation policy is simple: No commitment, cancel at any time. You sign no contracts—simply text us that you wish to cancel, and we'll do it.</p>
                </article>
                <article class="article">
                    <h3>How do I order my photos each month?</h3>
                    <p>Just text us your photos at 614-555-1234 and we'll take it from there. We need to receive your order by the end of the month—any orders that come in on the 3rd of the month, for example, will be fulfilled at the end of that month.</p>
                </article>
                <article class="article">
                    <h3>Are different photo sizes offered?</h3>
                    <p>At this time, we only offer photos in the 6'x4' size. If we offer new sizes in the future, we'll let you know.</p>
                </article>
                <article class="article">
                    <h3>When do I get my photos?</h3>
                    <p>We send out photos at the start of each month, so you'll receive them in your mail around the 5th. Remember, you'll need to text us your photos by the end of the month so we can do this. </p>
                    <p>Don’t see the answer to your question? Contact us using <a href="#">this form</a>.</p>
                </article>
            </section>
            <div class="mail-block">
                <div class="happy-mailbox">
                    <h2>Happy Mailbox Guarantee</h2>
                    <p>We're not happy till you're happy. If you're not happy with your photos, let us know and we'll be happy to give you a full refund—no questions asked. </p>
                </div>
                <ul class="cc-holder">
                    <li>
                        <a href="#"><img src="/assets/images/master-card.jpg" width="54" height="34" alt="master-card"></a>
                    </li>
                    <li>
                        <a href="#"><img src="/assets/images/visa.jpg" width="52" height="34" alt="visa-card"></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@stop

@section('lightbox')
    @include('forms.lightbox')
@stop