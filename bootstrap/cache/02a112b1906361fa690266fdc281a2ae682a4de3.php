<?php $__env->startSection('title'); ?> <?php echo e($product->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>

<?php $__env->startSection('content'); ?>
   

    <div class="product" style="pading: 6rem;" id="product" data-token="<?php echo e($token); ?>"
     data-id="<?php echo e($product->id); ?>">
        <div class="text-center">
            <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size: 3rem; 
            padding-bottom:3rem; color: #0a0a0a;"></i>
        </div>
        <section class="item-container" v-if="loading == false">
            <div class="grid-x cell">
            <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a :href="'/product/category/'+ category.slug">
                            {{ category.name }}</a>
                        </li>
                        <li><a :href="'/product/csubategory/'+ subCategory.slug">
                            {{ subCategory.name }}</a>
                        </li>
                        <li>{{ product.name }}</li>
                        
                    </ul>
                </nav>
            </div>

            <div class="grid-x">
                <div class="small-12 medium-5 large-4 cell">
                    <div>
                        <img :src="'/' + product.image_path" width="100%" height="200">
                    </div>
                </div>
                <div class="small-12 medium-7 large-8 cell">
                    <div class="product-details">
                        <h2> {{ product.name }}</h2>
                        <p> {{ product.description }} </p>
                        <h2> ${{ product.price}}</h2>
                        <button class="button alert">Add to Cart</button>
                    </div>
                </div>

            </div>
        </section>
        <section class="home" v-if="loading == false">
            <div class="display-products">
            <h2>Similar Products</h2>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="small-12 cell" v-cloak v-for="similar in similarProducts">
                    <a :href="'/product/' + similar.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                                <img :src="'/' + similar.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    {{ stringLimit(similar.name, 15) }}
                                </p>
                                <a :href="'/product/' + similar.id" class="button more expanded">
                                    See More
                                </a>
                                <button v-if="similar.quantity > 0" @click.prevent="addToCart(similar.id)" class="button cart expanded">
                                    ${{ similar.price }} - Add to cart
                                </button>
                                <button v-else class="button warning expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>