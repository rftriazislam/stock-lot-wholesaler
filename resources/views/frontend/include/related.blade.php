 <div class="ps-section--default">
     <div class="ps-section__header">
         <h3>Related products</h3>
     </div>
     <div class="ps-section__content">
         <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000"
             data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2"
             data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5"
             data-owl-duration="1000" data-owl-mousedrag="on">

             @foreach (Hel::subcategory_related($subcategory_id) as $item)
                 <div class="ps-product">
                     <div class="ps-product__thumbnail"><a
                             href="{{ route('product.view', [$item->id, $item->slug]) }}"><img class="zoomm"
                                 src="{{ asset('storage') }}/merchant/product/main/small/{{ $single_product->main_picture }}"
                                 alt=""></a>
                         <ul class="ps-product__actions">
                             <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                         class="icon-bag2"></i></a></li>
                             <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal"
                                     data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                             <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i
                                         class="icon-heart"></i></a></li>

                         </ul>
                     </div>
                     <div class="ps-product__container"><a class="ps-product__vendor ti" href="#">SHOP NAME</a>
                         <div class="ps-product_g_content ti"><a class="ps-product__title" href="product-default.html">
                                 {{ $item->product_name }}</a>
                             <div class="ps-product__rating">
                                 <select class="ps-rating" data-read-only="true">
                                     <option value="1">1</option>
                                     <option value="1">2</option>
                                     <option value="1">3</option>
                                     <option value="1">4</option>
                                     <option value="2">5</option>
                                 </select><span>01</span>
                             </div>
                             <p class="ps-product__price">
                                 {{ Currency::mc('BDT', $item->price + $item->service_charge) }}</p>
                         </div>

                     </div>
                 </div>
             @endforeach




         </div>
     </div>
 </div>
