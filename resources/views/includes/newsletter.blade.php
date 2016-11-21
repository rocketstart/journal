<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

            <p class="text-center">Verfolge unser Journal bis in die Tiefen des Weltalls</p>

            <form action="{{ route('subscriber.store') }}" method="post">
                {{ csrf_field() }}

                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Deine Email Adresse" name="email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Abonnieren</button>
                    </span>
                </div>

                @if ($errors->has('email'))
                    <hr>
                    <span class="help-block text-center">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif

            </form>

        </div>
    </div>
</div>