<div class="container">

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">

            <p>Verfolge unser Journal bis in die tiefen des Weltalls</p>

            <form action="{{ route('subscriber.store') }}" method="post">
                {{ csrf_field() }}

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Deine Email Adresse" name="email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Abonnieren</button>
                    </span>
                </div>

            </form>

        </div>
    </div>
</div>