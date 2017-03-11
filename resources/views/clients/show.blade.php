@if ($client)
{{$client->first_name}}
{{$client->last_name}}
{{$client->phone}}
{{$client->email}}
@else
client not found
@endif