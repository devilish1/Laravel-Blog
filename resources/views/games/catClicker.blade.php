@extends('welcome')

@section('blogcontent')
<link href="/css/catclicker.css" rel="stylesheet">

<link href="/css/catclicker.css" rel="stylesheet">

<div id="catgame-links">

    <ul data-bind="foreach: { data: cats, as: 'cat' }">
        <li>

            <a href="#" data-bind="click: showCat()"><span data-bind="text: name"> </span></a>
        </li>
    </ul>
</div>

<div data-bind="visible: activeCat">
    <p><span data-bind="text: catName()"></span>
    </p>

    <p><span data-bind="text: catLevel()"></span>
    </p>
    <img src="" data-bind="click: incrementClickCounter(), attr: {src: catSrc()}">
        <p id="catgame-clicks" >
           <span data-bind="text: catClicks()">
        </p>
    </img>
</div>


<script src="js/knockout.js"></script>
<script src="js/catClicker/koApp.js"></script>

{{-- <div id="catgame-cat" data-bind="visible: showCatInfo">
    <p id="catgame-name">
    </p>
    <img id="catgame-img" src="">
        <p id="catgame-clicks">
            0 clicks
        </p>
    </img>
</div>
<div class="catgame-admin">
    <button id="catgame-admin-button" type="button">
        Admin
    </button>
    <div id="catgame-admin-info">
        <div class="form-group">
            <label for="newName">
                New name:
            </label>
            <input class="form-control" id="catgame-newName" name="newName" required="" type="text">
            </input>
        </div>
        <div class="form-group">
            <label for="newCount">
                New name:
            </label>
            <input class="form-control" id="catgame-newCount" name="newCount" required="" type="number">
            </input>
        </div>
        <button class="btn btn-primary" id="catgame-submit-button" type="submit">
            Submit
        </button>
    </div>
</div>
<script src="js/catClicker/App.js">
</script> --}}

    @endsection
</link>