@props(['btnCreateActive'=>'','headersTable'])

{{$btnCreateActive}}

<table class="table table-responsive table-striped table-hover">
    <thead class="">
      {{$headersTable}}
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>