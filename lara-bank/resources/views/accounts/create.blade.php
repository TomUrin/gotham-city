@extends('main')

@section('content')
<form class="create" action="{{route('accounts-store')}}" method="post" type="submit">
    <input type="hidden" name="client" value="" readonly>
        <div class="container">
            <h2>Add new bank account</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="name" required="required"></input>
                        <span class="text">Name</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="surname" required="required"></input>
                        <span class="text">Surname</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="personId" required="required"></input>
                        <span class="text">Personal ID</span>
                        <span class="line"></span>
                    </div>
                    <br>
                    <div style="color: crimson;">{{ $errors->first('personId') }}</div>
                </div>
            </div>
@csrf
            <div class="row100">
                <div class="col">
                    <button class="add" type="submit" name="submit" value="send">CREATE</button>
                </div>
            </div>
        </div>
</form>
@endsection