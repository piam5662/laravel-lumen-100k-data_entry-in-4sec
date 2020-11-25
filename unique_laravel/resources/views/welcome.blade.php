<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<form method="get" action="{{ route('unique_n_generator') }}">
    <input type="number" name="number" placeholder="please enter integer number ">
    <input type="submit" name="submit" value="submit">

</form>
</html>
