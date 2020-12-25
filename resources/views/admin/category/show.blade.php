<h3>Basic Information</h3>
<table class="table table-hover table-bordered">
    <tr>
        <th>Category Name</th>
        <td>{{ $model->category_name }}</td>
    </tr>
    <tr>
        <th>Category Name (Nepali)</th>
        <td>{{ $model->category_name_np }}</td>
    </tr>
    <tr>
        <th>Parent Category</th>
        <td>
            @if($model->parent_id == 0)
                Main Category
            @else
                 {{ $model->subCategory->category_name_np }}
            @endif
        </td>
    </tr>
</table>

<hr>
<h3>SEO Details</h3>
<table class="table table-hover table-bordered">

    <tr>
        <th>SEO Title</th>
        <td>
            @if(empty($model->seo_title))
                N/A
            @else
                {{ $model->seo_title }}
            @endif
        </td>
    </tr>

    <tr>
        <th>SEO Sub Title</th>
        <td>
            @if(empty($model->seo_subtitle))
                N/A
            @else
                {{ $model->seo_subtitle }}
            @endif
        </td>
    </tr>

    <tr>
        <th>SEO Description</th>
        <td>
            @if(empty($model->seo_description))
                N/A
            @else
                {{ $model->seo_description }}
            @endif
        </td>
    </tr>

    <tr>
        <th>SEO Keywords</th>
        <td>
            @if(empty($model->keywords))
                N/A
            @else
                {{ $model->keywords }}
            @endif
        </td>
    </tr>
</table>
