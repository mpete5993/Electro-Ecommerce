<div class="__modal">
        <div class="__modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="__close_btn">
                            <p>&times;</p>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 __product_image ">
                        <div class="product-image">
                            <img src="img/phones/s-l1600 (72).jpg" width="300px" height="300px" alt="resized image">
                        </div>

                    </div>
                    <div class="col-lg-8 bg-">
                        <div class="product_content">
                            <div>
                                <h4>Product Name</h4>
                                <p>R10,000</p>
                                <p class="__product_description">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas est incidunt ex
                                    dolor! Libero explicabo, nemo
                                    saepe vel alias optio. Reprehenderit delectus aut deleniti necessitatibus sunt.
                                    Officia velit culpa maxime.
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas dolorem delectus
                                    aperiam perspiciatis suscipit in
                                    nostrum laudantium, impedit, ullam quia exercitationem consequatur illo officia
                                    culpa hic. Vitae nam eaque neque.
                                </p>
                            </div>
                            <div class="__featured_images">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="img/phones/s-l1600 (75).jpg" alt="" width="100%">
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="img/phones/s-l1600 (73).jpg" alt="">
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="img/phones/s-l1600 (74).jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_cart">
                                <input type="number" value="1" class="quantity">
                                <button class="__add_to_cart">Add to cart</button>
                            </div>
                            <div class="__product_category">
                                <div class="category">
                                    <h5>Category :</h5>
                                </div>
                                <div class="__category_info">
                                    <p>Laptops</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
          /*============================= */
    /*       Product modal          */
    /*============================= */
    
    let modal = document.querySelector('.__modal');
    let openModal = document.querySelector('.product_modal');
    let closeModal = document.querySelector('.__close_btn');

    openModal.addEventListener('click', () => {
            modal.style.display = 'block';
        });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });

    /*============================= */
    /*       Product modal          */
    /*============================= */
    </script>