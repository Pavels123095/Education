@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            <div class="grey-box-icon">
            <div class="icon-box-top grey-box-icon-pos">
                <img src="/assets/images/1.png" alt="" />
            </div><!--icon box top -->
            <h4>Online Courses</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
            eset nec lacus elit dor broma.</p>
                <p><a href="#"><em>Read More</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
            <div class="icon-box-top grey-box-icon-pos">
                <img src="/assets/images/2.png" alt="" />
            </div><!--icon box top -->
            <h4>Meet our Staff</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
            eset nec lacus elit dor broma.</p>
                <p><a href="#"><em>Read More</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
            <div class="icon-box-top grey-box-icon-pos">
                <img src="/assets/images/3.png" alt="" />
            </div><!--icon box top -->
            <h4>Latest Updates</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
            eset nec lacus elit dor broma.</p>
                <p><a href="#"><em>Read More</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
            <div class="icon-box-top grey-box-icon-pos">
                <img src="/assets/images/4.png" alt="" />
            </div><!--icon box top -->
            <h4>Placements</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
            eset nec lacus elit dor broma.</p>
                <p><a href="#"><em>Read More →</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        </div>
    </div>
    <section class="news-box top-margin">
      <div class="container">
          <h2><span>New Courses</span></h2>
          <div class="row">
      
              <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="newsBox">
                      <div class="thumbnail">
                          <figure><img src="/assets/images/news2.jpg" alt=""></figure>
                          <div class="caption maxheight2">
                          <div class="box_inner">
                                      <div class="box">
                                          <p class="title"><h5>Developer</h5></p>
                                          <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                      </div> 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="newsBox">
                      <div class="thumbnail">
                          <figure><img src="/assets/images/news3.jpg" alt=""></figure>
                          <div class="caption maxheight2">
                          <div class="box_inner">
                                      <div class="box">
                                          <p class="title"><h5>Photography   </h5></p>
                                          <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                      </div> 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="newsBox">
                      <div class="thumbnail">
                          <figure><img src="/assets/images/news4.jpg" alt=""></figure>
                          <div class="caption maxheight2">
                          <div class="box_inner">
                                      <div class="box">
                                          <p class="title"><h5>Audio Editing</h5></p>
                                          <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                      </div> 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <section class="container">
      <div class="row">
      	<div class="col-md-8"><div class="title-box clearfix "><h2 class="title-box_primary">About Us</h2></div> 
        <p><span>Perspiciatis unde omnis iste natus error sit voluptatem. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus musull dui.</span></p>
        <p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p><p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p>
        <a href="#" title="read more" class="btn-inline " target="_self">read more</a> </div>
              
          
          <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">Up Coming Courses</h2></div> 
            <div class="list styled custom-list">
            <ul>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Mathematics and Computer Science</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Mathematics and Philosophy</a></li>
            <li><a title="Penatibus et magnis dis parturient montes ascetur ridiculus mus." href="#">Philosophy and Modern Languages</a></li>
            <li><a title="Morbi nunc odio gravida at cursus nec luctus a lorem. Maecenas tristique orci." href="#">History (Ancient and Modern)</a></li>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Classical Archaeology and Ancient History</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Physics and Philosophy</a></li>
            </ul>
            </div>
         </div>
      </div>
    </section>
@endsection
