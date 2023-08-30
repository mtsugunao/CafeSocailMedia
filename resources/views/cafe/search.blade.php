<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
<form action="{{ route('cafe.search.keyword') }}" method="GET">
    <label for="search-keyword">Search Cafe by keyword:</label>
    <input type="text" id="search-keyword" name="keyword" placeholder="eg. name, province, city">
    <button type="submit">Search</button>
</form>

<form action="{{ route('cafe.search.province') }}" method="GET">
<button id="showCheckboxes" type="button">Search by area</button>
<div id="checkboxes" style="display: none;">
  <fieldset>
    <p>
        <input type="checkbox" id="ab" name="canada[]" value="Alberta"><label for="ab">Alberta</label>
        <input type="checkbox" id="bc" name="canada[]" value="British Columbia"><label for="bc">British Columbia</label>
        <input type="checkbox" id="mb" name="canada[]" value="Manitoba"><label for="mb">Manitoba</label>
        <input type="checkbox" id="nb" name="canada[]" value="New Brunswick"><label for="nb">New Brunswick</label>
        <input type="checkbox" id="nl" name="canada[]" value="Newfoundland and labrador"><label for="nl">Newfoundland and labrador</label>
        <input type="checkbox" id="nt" name="canada[]" value="Northwest Territories"><label for="nt">Northwest Territories</label>
        <input type="checkbox" id="ns" name="canada[]" value="Nova Scotia"><label for="ns">Nova Scotia</label>
    </p>
    <p>
        <input type="checkbox" id="nu" name="canada[]" value="Nunavut"><label for="nu">Nunavut</label>
        <input type="checkbox" id="on" name="canada[]" value="Ontario"><label for="on">Ontario</label>
        <input type="checkbox" id="pe" name="canada[]" value="Prince Edward Island"><label for="pe">Prince Edward Island</label>
        <input type="checkbox" id="qc" name="canada[]" value="Quebec"><label for="qc">Quebec</label>
        <input type="checkbox" id="sk" name="canada[]" value="Saskatchewan"><label for="sk">Saskatchewan</label>
        <input type="checkbox" id="yt" name="canada[]" value="Yukon"><label for="yt">Yukon</label>
    </p>
  </fieldset>
  <fieldset>
    <p>
        <input type="checkbox" id="al" name="us[]" value="Alabama"><label for="al">Alabama</label>
        <input type="checkbox" id="ak" name="us[]" value="Alaska"><label for="ak">Alaska</label>
        <input type="checkbox" id="az" name="us[]" value="Arizon"><label for="az">Arizon</label>
        <input type="checkbox" id="ar" name="us[]" value="Arkansas"><label for="ar">Arkansas</label>
        <input type="checkbox" id="ca" name="us[]" value="California"><label for="ca">California</label>
        <input type="checkbox" id="co" name="us[]" value="Colorado"><label for="co">Colorado</label>
        <input type="checkbox" id="ct" name="us[]" value="Connecticut"><label for="ct">Connecticut</label>
        <input type="checkbox" id="de" name="us[]" value="Delaware"><label for="de">Delaware</label>
    </p>
    <p>
        <input type="checkbox" id="fl" name="us[]" value="Florida"><label for="fl">Florida</label>
        <input type="checkbox" id="ga" name="us[]" value="Gergia"><label for="ga">Gergia</label>
        <input type="checkbox" id="hi" name="us[]" value="Hawaii"><label for="hi">Hawaii</label>
        <input type="checkbox" id="id" name="us[]" value="Idaho"><label for="id">Idaho</label>
        <input type="checkbox" id="il" name="us[]" value="Illinois"><label for="il">Illinois</label>
        <input type="checkbox" id="in" name="us[]" value="Indiana"><label for="in">Indiana</label>
        <input type="checkbox" id="ia" name="us[]" value="Iowa"><label for="ia">Iowa</label>
        <input type="checkbox" id="ks" name="us[]" value="Kansas"><label for="ks">Kansas</label>
    </p>
    <p>
        <input type="checkbox" id="ky" name="us[]" value="Kentucky"><label for="ky">Kentucky</label>
        <input type="checkbox" id="la" name="us[]" value="Louisiana"><label for="la">Louisiana</label>
        <input type="checkbox" id="me" name="us[]" value="Maine"><label for="me">Maine</label>
        <input type="checkbox" id="md" name="us[]" value="Maryland"><label for="md">Maryland</label>
        <input type="checkbox" id="ma" name="us[]" value="Massachusetts"><label for="ma">Massachusetts</label>
        <input type="checkbox" id="mi" name="us[]" value="Michigan"><label for="mi">Michigan</label>
        <input type="checkbox" id="mn" name="us[]" value="Minnesota"><label for="mn">Minnesota</label>
        <input type="checkbox" id="ms" name="us[]" value="Mississippi"><label for="ms">Mississippi</label>
    </p>
    <p>
        <input type="checkbox" id="mo" name="us[]" value="Missouri"><label for="mo">Missouri</label>
        <input type="checkbox" id="mt" name="us[]" value="Montana"><label for="mt">Montana</label>
        <input type="checkbox" id="ne" name="us[]" value="Nebraska"><label for="ne">Nebraska</label>
        <input type="checkbox" id="nv" name="us[]" value="Nevada"><label for="nv">Nevada</label>
        <input type="checkbox" id="nh" name="us[]" value="New Hampshire"><label for="nh">New Hampshire</label>
        <input type="checkbox" id="nj" name="us[]" value="New Jersey"><label for="nj">New Jersey</label>
        <input type="checkbox" id="nm" name="us[]" value="New Mexico"><label for="nm">New Mexico</label>
        <input type="checkbox" id="ny" name="us[]" value="New York"><label for="ny">New York</label>
    </p>
    <p>
        <input type="checkbox" id="nc" name="us[]" value="North Carolina"><label for="nc">North Carolina</label>
        <input type="checkbox" id="nd" name="us[]" value="North Dakota"><label for="nd">North Dakota</label>
        <input type="checkbox" id="oh" name="us[]" value="Ohio"><label for="oh">Ohio</label>
        <input type="checkbox" id="ok" name="us[]" value="Oklahoma"><label for="ok">Oklahoma</label>
        <input type="checkbox" id="or" name="us[]" value="Oregon"><label for="or">Oregon</label>
        <input type="checkbox" id="pa" name="us[]" value="Pennsylvania"><label for="pa">Pennsylvania</label>
        <input type="checkbox" id="ri" name="us[]" value="Rhode Island"><label for="ri">Rhode Island</label>
        <input type="checkbox" id="sc" name="us[]" value="South Carolina"><label for="sc">South Carolina</label>
    </p>
    <p>
        <input type="checkbox" id="sd" name="us[]" value="South Dakota"><label for="sd">South Dakota</label>
        <input type="checkbox" id="tn" name="us[]" value="Tenessee"><label for="tn">Tenessee</label>
        <input type="checkbox" id="tx" name="us[]" value="Texas"><label for="tx">Texas</label>
        <input type="checkbox" id="ut" name="us[]" value="Utah"><label for="ut">Utah</label>
        <input type="checkbox" id="vt" name="us[]" value="Vermont"><label for="vt">Vermont</label>
        <input type="checkbox" id="va" name="us[]" value="Virginia"><label for="va">Virginia</label>
        <input type="checkbox" id="wa" name="us[]" value="Washington"><label for="wa">Washington</label>
        <input type="checkbox" id="wv" name="us[]" value="West Virginia"><label for="wv">West Virginia</label>
    </p>
    <p>
        <input type="checkbox" id="wi" name="us[]" value="Wisconsin"><label for="wi">Wisconsin</label>
        <input type="checkbox" id="wy" name="us[]" value="Wyoming"><label for="wy">Wyoming</label>
    </p>
  </fieldset>
  <button id="closeCheckboxes" type="button">Close</button>
</div>
  <button type="submit" id="submitButton" style="display: none;">Search</button>
</form>
<script>
    var showCheckboxesButton = document.getElementById('showCheckboxes');
    var checkboxesDiv = document.getElementById('checkboxes');
    var submitButton = document.getElementById('submitButton');
    var closeCheckboxesButton = document.getElementById('closeCheckboxes');

    showCheckboxesButton.addEventListener('click', function() {
        checkboxesDiv.style.display = 'block';
        showCheckboxesButton.style.display = 'none';
        submitButton.style.display = 'block';
    });

    closeCheckboxesButton.addEventListener('click', function() {
        checkboxesDiv.style.display = 'none';
        showCheckboxesButton.style.display = 'block';
        submitButton.style.display = 'none';
    });

    submitButton.addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>
</body>
</html>