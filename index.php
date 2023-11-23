<h2>変換したいお金を日本円で記述してください。</h2>

<form action="print.php" method="POST">
    <label for="selects">変換する通貨を選択してください。</label>
    <select name="selectcountry">
        <option value="America">アメリカ</option>
        <option value="China">中国</option>
        <option value="France">フランス</option>
        <option value="Germany">ドイツ</option>
        <option value="Italy">イタリア</option>
        <option value="Uk">イギリス</option>
        <option value="Canada">カナダ</option>
    </select>
    <input type = "text" name = "a"/>
    <input type="submit" value="送信"/>
</form>