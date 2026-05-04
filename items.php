<?php 
                        $productresult=getproductbyid($cat_id);
                        while($productrow=mysqli_fetch_assoc($productresult)){
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $productrow['prod_img'] ?>" alt="">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="product.php?itemid=<?=$productrow['prod_id']?>"><?= $productrow['prod_name']?></a>
                                    <span class="text-primary me-1">$<?= $productrow['prod_price']?></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="detail.php?prod_id=<?= $productrow['prod_id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php?itemid=<?=$productrow['prod_id']?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                            <?php
                        }

                        ?>
