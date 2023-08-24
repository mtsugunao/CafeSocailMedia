<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe register</title>
</head>
<body>
    <h1>Modify cafe information form!</h1>
    <div>
    @if (session('feedback.success'))
    <p style="color: green;">{{ session('feedback.success') }}</p>
    @endif

    <form action="{{ route('cafe.update.put', ['cafeId' => $cafe->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
        <label for="cafeName">Cafe Name:</label>
        <input type="text" id="cafeName" name="cafeName" value="{{ $cafe->name }}">
            @error('cafeName')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
        <label for="country">Country</label>
        <select id="country" name="country">
            @if($cafe->country === "Canada")
            <option value="Canada" selected>Canada</option>
            <option value="United States">United States</option>
            @else
            <option value="Canada">Canada</option>
            <option value="United States" selected>United States</option>
            @endif
        </select>
            @error('country')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="province">Province:</label>
            <select id="province" name="province">
            @if($cafe->country === "Canada")
                <?php
                $caProvince = [
                    'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and labrador', 'Nova Scotia', 'Prince Edward Island', 'Quebec',
                    'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'
                ];
                ?>
                @foreach ($caProvince as $province)
                    @if($cafe->province === $province)
                        $provinceSelect.append('<option value="{{ $province }}" class="canada-option" selected>{{ $province }}</option>');
                    @else
                        $provinceSelect.append('<option value="{{ $province }}" class="canada-option">{{ $province }}</option>');
                    @endif
                @endforeach
            @else
                <?php
                $usStates = [
                    'Alabama', 'Alaska', 'Arizon', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Gergia', 'Hawaii', 'Idaho', 'Illinois',
                    'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
                    'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania',
                    'Rhode Island', 'South Carolina', 'South Dakota', 'Tenessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
                ];
                ?>
                @foreach ($usStates as $state)
                    @if($cafe->province === $state)
                        $provinceSelect.append('<option value="{{ $state }}" class="us-option" selected>{{ $state }}</option>');
                    @else
                        $provinceSelect.append('<option value="{{ $state }}" class="us-option">{{ $state }}</option>');
                    @endif
                @endforeach
            @endif
            </select>
            @error('province')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ $cafe->city }}">
            @error('city')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="streetAddress">Street Address:</label>
            <input type="text" id="streetAddress" name="streetAddress" value="{{ $cafe->street_address }}">
            @error('streetAddress')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="postalCode">Postal Code:</label>
            <input type="text" id="postalCode" name="postalCode" value="{{ $cafe->postalcode }}">
            @error('postalCode')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="parking">Parking Information:</label>
            <input type="text" id="parking" name="parking" value="{{ $cafe->parking }}">
            @error('parking')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50">{{ $cafe->description }}</textarea>
            @error('description')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="image">Profile image:</label>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg">
            @error('image')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Submit Cafe Information">
        </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var selectedCountry = $(this).val();
            var $provinceSelect = $('#province');
            
            if (selectedCountry === 'Canada') {
                $provinceSelect.empty();
             
                <?php
                $caProvince = [
                    'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and labrador', 'Nova Scotia', 'Prince Edward Island', 'Quebec',
                    'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'
                ];
                ?>
                @foreach ($caProvince as $province)
                    $provinceSelect.append('<option value="{{ $province }}" class="canada-option">{{ $province }}</option>');
                @endforeach
                
            } else if (selectedCountry === 'United States') {
                $provinceSelect.empty(); 
                
                <?php
                $usStates = [
                    'Alabama', 'Alaska', 'Arizon', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Gergia', 'Hawaii', 'Idaho', 'Illinois',
                    'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
                    'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania',
                    'Rhode Island', 'South Carolina', 'South Dakota', 'Tenessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
                ];
                ?>

                @foreach ($usStates as $state)
                    $provinceSelect.append('<option value="{{ $state }}" class="us-option">{{ $state }}</option>');
                @endforeach

            } else {
                $provinceSelect.empty();

            }
        });
    });
</script>

</body>
</html>