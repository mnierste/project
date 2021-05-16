@extends('layouts/layouts')

@section('title', 'Max Nierste, Vue Tasks')
@section('content')
<div class="sectionBackgroundGray p-b-md">
  <div class="container sectionBackgroundGray">
    <h1 class="text-center aboutTitle">List for Store</h1>
  </div>

  <div class="container">
    <div class="row m-b-sm">
      <form class="col-12" method="post" action="/storeadditem">
        <div class="row">
          <div class="input-group mb-3">
            <input style="padding-left:100px;" type="text" class="text-center form-control" placeholder="Item">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">Add Item</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center aboutTitle">GET LIST</h4>
        @foreach($items as $item)
        <div class="card" style="background-color:#BBFFA6">
          <div class="text-center row">
            <div class="col-10">
              <p class="font-weight-bold">{{ $item->name }}</p>
            </div>
            <div class="col-2">
              <i class="fa fa-times-circle" onclick="@remove($item->id)" style="color:red"></i>
            </div>
          </div>
        </div> <!-- end app -->
        @endforeach
      </div>

      <div class="col-md-4 col-sm-12">
        <h4 class="text-center aboutTitle">Other Options</h4>
        @foreach($selection as $oItem)
        <div class="card">
          <div class="text-center row">
            <div class="col-10">
              <p class="font-weight-bold">{{ $oItem->name }}</p>
            </div>
            <div class="col-2">
              <i class="fa fa-plus-circle" style="color:#BBFFA6"></i>
            </div>
          </div>
        </div> <!-- end app -->
        @endforeach
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  remove($item->id)
</script>

@endsection
