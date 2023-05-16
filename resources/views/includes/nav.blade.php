<?php $categories = \App\models\Category::with('subCategories')->get(); ?>
<header class="navigation">
    <div class="title-bar" data-responsive-toggle="acme-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle="acme-menu"></button>
        <div class="title-bar-title"><a href="/">My Store</a> </div>
    </div>

    <div class="top-bar" id="acme-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu fixx" data-dropdown-menu>
                <li class="menu-text logo" onclick="location.href='/'"></li>
                <li><a href="/products">Products</a></li>
                @if(count($categories))
                    <li>
                        <a href="/products/category">Categories</a>
                        <ul class="menu vertical dropdown">
                            @foreach($categories as $category)
                                <li>
                                    <a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a>
                                    @if(count($category->subCategories))
                                        <ul class="menu vertical">
                                            @foreach($category->subCategories as $subCategory)
                                                <li>
                                                    <a href="/products/category/{{ $category->slug }}/{{ $subCategory->slug }}">
                                                        {{ $subCategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
                <div class="top-bar-right">
                    <ul class="dropdown menu vertical medium-horizontal">
                        <li><a href="#">Username</a></li>
                        <li><a href="#">Sign In</a> </li>
                        <li><a href="#">Register</a> </li>
                        <li><a href="/cart">Cart</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>