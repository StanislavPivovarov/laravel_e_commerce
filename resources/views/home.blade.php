@extends('app')

@section('content')
<div class="container-fluid client" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
                <input id = "token"type="hidden" name="token" value="{{ \RenderTree::tokenEncrypt() }}">

                <div class="panel-heading category client_categories">
                    Categories
                </div>
                <div id="client_tree">
                    <ul>
                        @foreach($tree as $category)
                            <?php print_r(RenderTree::makeClientTree($category)); ?>
                        @endforeach
                    </ul>
                </div>
		</div>
	</div>

        <div class="col-md-7 ">
            <div class="container-fluid client_products">
            </div>
        </div>
</div>
    <script type="text/template" id="client_product_template">

        <div class="col-md-3 col-md-offset-1 client_product_info">

            <div class="row">
                <div class="col-md-12">
                    <img data-product_id=" <%= id %>" class="client_product_photo" src="<%= photo %>" alt="" width="200" height="150"/>
                </div>
            </div>

            <div class="row">
                <div data-product_id=" <%= id %>" class="col-md-12 client_product_name">
                    <%= name %>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Price in $:<%= price %>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
            Description: <%= description %>
                </div>
            </div>
        </div>

    </script>


@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('/jquery/client-category-tree.js') }}"></script>

@endsection
