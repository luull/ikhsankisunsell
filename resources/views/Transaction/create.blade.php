<form action="{{ route('transaction.store') }}" method="POST">
    @csrf
    <label for="produk">Produk:</label>
    <select name="produk" id="produk">
        <option value="pulsa">Pulsa</option>
        <option value="data">Paket Data</option>
    </select>

    <label for="provider">Provider:</label>
    <select name="provider" id="provider">
        <option value="telkomsel">Telkomsel</option>
        <option value="indosat">Indosat</option>
        <option value="xl">XL</option>
    </select>

    <label for="no_hp">Phone Number:</label>
    <input type="text" name="no_hp" id="no_hp">

    <label for="amount">Amount:</label>
    <input type="number" name="amount" id="amount">

    <button type="submit">Submit</button>
</form>
