@extends('layouts.app')
@section('title', 'Categories'." -")
@section('content')
<div class="container white-bg">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="/control">Control panel</a></li>
          <li class="is-active"><a href="#" aria-current="page">Categories</a></li>
        </ul>
      </nav>
    
    <div class="column is-12">
        <a href="/control/categories/add" class="button is-link @if(config('isMobile')) is-fullwidth @endif">
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>
            <span>
            Add new category
            </span>
        </a>
    </div>

    <div class="is-divider"></div>

    <div class="columns">
        <div class="column">
            @if(count($categories) <= 0)
                <div class="column has-text-centered">
                <h3 class="subtitle">No categories yet</h3>
                </div>
            @else
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $categ)
                            <tr>
                                <td>
                                <a href="/category/{{$categ->category_name}}"><b>{{$categ->category_name}}</b></a>
                                </td>
                                <td>
                                    @if(config('isMobile') != true)
                                        <form action="/control/categories/raise" method="post" style="display:inline;">
                                            @csrf
                                            <input type="text" name="id" value="{{$categ->id}}" class="invisible">
                                            <button @if($categ->visual_order == 1) disabled @endif class="button is-success" data-tooltip="Raise this category in list"><i class="fas fa-arrow-up"></i></button>
                                        </form>

                                        <form action="/control/categories/lower" method="post" style="display:inline;">
                                            @csrf
                                            <input type="text" name="id" value="{{$categ->id}}" class="invisible">
                                            <button @if($categ->visual_order == $max) disabled @endif  class="button is-primary" data-tooltip="Lower this category in list"><i class="fas fa-arrow-down"></i></button>
                                        </form>

                                        <a href="/control/categories/edit/{{$categ->id}}" class="button is-info">
                                            <span class="icon is-small" data-tooltip="Edit this category">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <button class="button is-danger showModalDelete" data-tooltip="Delete this category" 
                                            data-title="{{$categ->category_name}}" data-id="{{$categ->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <div class="field has-addons">
                                            <p class="control">
                                                <form action="/control/categories/raise" method="post" style="display:inline;">
                                                    @csrf
                                                    <input type="text" name="id" value="{{$categ->id}}" class="invisible">
                                                    <button style="border-top-right-radius: 0; border-bottom-right-radius: 0;" @if($categ->visual_order == 1) disabled @endif class="button is-success" data-tooltip="Raise this category in list"><i class="fas fa-arrow-up"></i></button>
                                                </form>
                                            </p>
                                            <p class="control">
                                                <form action="/control/categories/lower" method="post" style="display:inline;">
                                                    @csrf
                                                    <input type="text" name="id" value="{{$categ->id}}" class="invisible">
                                                    <button style="border-radius:0;" @if($categ->visual_order == $max) disabled @endif  class="button is-primary" data-tooltip="Lower this category in list"><i class="fas fa-arrow-down"></i></button>
                                                </form>
                                            </p>
                                            <p class="control">
                                                <a href="/control/categories/edit/{{$categ->id}}" class="button is-info">
                                                    <span class="icon is-small" data-tooltip="Edit this category">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                            </p>
                                            <p class="control">
                                                <button class="button is-danger showModalDelete" data-tooltip="Delete this category" 
                                                    data-title="{{$categ->category_name}}" data-id="{{$categ->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </p>
                                        </div>    
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('modals')
<div class="modal modalDelete">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">You sure?</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>Are you sure you want to delete this category?</p>
        <b id="modal_post_title"></b>
        <p>This will not delete the posts associated with this category.</p>
        <p class="has-text-danger">This action cannot be undone.</p>
      </section>
      <footer class="modal-card-foot">
          <form id="modal_form" action="/control/categories/delete" method="post" style="display:inline;">
                @method('DELETE')
                @csrf
                <input type="text" class="invisible" id="modal_form_input" name="modal_form_input">
        </form>
        <button class="button is-danger" id="submit_modal">Delete</button>
        <button class="button cancel">Cancel</button>
      </footer>
    </div>
</div>
@endsection


@push('scripts')
<script src="{{ asset('js/custom/control_panel/categories.js') }}"></script>
@endpush