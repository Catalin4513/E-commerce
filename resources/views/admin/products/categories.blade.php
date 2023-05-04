@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminCategories')


@section('content')
<div class="category">

    <div class="grid-x grid-padding-x">
        <div class="cell medium-11 cell">        
            <h2>Product Categories</h2> 
            <hr />
        </div>

    </div>
  @include('includes.message')


    <div class="grid-x grid-padding-x">
        <div class="small-12 medium-6 cell">        
            <form action="" method="post">
                <div class="input-group">                
                    <input type="text" class="input-group-field" placeholder="Search by name">
                    <div class="input-group-button">                    
                        <input type="submit" class="button" value="Search">
                    </div>            
                </div>
            </form>    
        </div>
        <div class="small-12 medium-5 end cell">
            <form action="/admin/product/categories" method="post">            
                <div class="input-group">
                    <input type="text" class="input-group-field" name="name" placeholder="Category Name">                
                    <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::_token() }}">
                    <div class="input-group-button">                    
                        <input type="submit" class="button" value="Create">
                    </div>            
                </div>
            </form>  
        </div>
    </div>
    <div class="grid-x">
        <div class="small-12 medium-11 cell">
            @if(count($categories))
            <table class="hover" data-form="deleteForm">
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category['name']}}</td>
                        <td>{{$category['slug']}}</td>
                        <td>{{$category['added']}}</td>
                        <td width="100" class="text-right">
                          <span> 
                          <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                          </span>
                          <span style="display: inline-block">
                            <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete"
                             class="delete-item"> 
                            <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::_token() }}">
                            <button type="submit"><i class="fa fa-times delete"></i> </button>
                            </form>
                          </span>
                            <!-- edit category modal  -->
                                <div class="reveal" id="item-{{$category['id']}}"
                                 data-reveal data-close-on-click="false" data-close-on-esc="false"
                                 data-animation-in="scale-in-up" >

                                 <div class="notification callout primary"></div>
                                    <h2>Edit Category</h2>
                                        <form >            
                                        <div class="input-group">
                                        <input type="text" id="item-name-{{$category['id']}}"
                                         name="name" value="{{ $category['name'] }}">                
                                        
                                        <div >                    
                                        <input type="submit" class="button update-category" 
                                        id="{{$category['id']}}"
                                        name="token" 
                                        data-token="{{ \App\classes\CSRFToken::_token() }}"
                                        value="Update">
                                        </div>            
                                        </div>
                                        </form>  
                                    <a href="/admin/product/categories" class="close-button"  aria-label="Close modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                            
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $links !!}

            @else
                <h3>You hava not created any category</h3>
            @endif


        </div>

    </div>    
</div>

@include('includes.delete-modal')
                    
@endsection