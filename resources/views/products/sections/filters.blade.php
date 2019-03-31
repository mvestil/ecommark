<div class="row filtering">
    <div class="col-md-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="sold-out-filter">
            <label class="form-check-label" for="defaultCheck1">
                Sold Out
            </label>
        </div>
    </div>

    <div class="col-md-3">
        <div>Categories</div>
        <select id="category-filter" class="custom-select">
            <option value=0>Categories</option>
        </select>
    </div>

    <div class="col-md-3">
        <select id="sort-by-filter" class="custom-select">
            <option value="price">Price</option>
            <option value="name">Name</option>
        </select>

        <select id="sort-order-filter" class="custom-select">
            <option value="asc">Asc</option>
            <option value="desc">Desc</option>
        </select>
    </div>

    <div class="col-md-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Price From and To</span>
            </div>
            <input id="price-from-filter" type="number" min="0" max="1000" class="form-control">
            <input id="price-to-filter" type="number" min="0" max="1000" class="form-control">
        </div>
    </div>
</div>

<div class="row apply-filtering">
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary apply-filter">Apply Filter</button>
    </div>
</div>
