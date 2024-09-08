<h3>Configure and name this batch</h3>

<form action="/civicrm/lp-setup" method="POST">
Batch Name: <input name="batchname" type="text"><br>
Batch size: <input type="radio" name="batchsize" value="150" checked> Letters (150)<input type="radio" name="batchsize" value="75"> Envelopes (75)<br>
<input type="submit" value="Create batches"/>
<input type="hidden" value="{$file}" name="file">
</form>
