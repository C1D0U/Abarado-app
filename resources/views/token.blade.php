<form method="POST" action="/token">
    @csrf

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    Search term: <input type="text" name="term" value="" />
    <button type="submit">GO</button>
</form>