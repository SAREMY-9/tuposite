@extends('back.pages.admin.home')
@section('content')


<form-group>
<form action="{{}}"  method="POST">

<h6>DRIVER'S TEST</h6><br>
    <input type="text"  name=""  value="" placeholder="Enter TDBNo...."><br><br>
    <input type="text"  name=""  value="" placeholder="Enter OfficerId.."><br><br>
    <input type="text"  name=""  value="" placeholder="Enter Theory Score..."><br><br>
    <input type="text"  name=""  value="" placeholder="Enter Practical Score..."><br><br>
    <input type="radio"  name=""  value="" placeholder="Enter Practical" value="true"><br><br>
     <button type="button" class="btn btn-secondary">Submit Score</button>


</form>
</form-group>
@endsection