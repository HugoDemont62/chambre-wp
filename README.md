# TP WordPress: Designing a Bed & Breakfast Website

## Admin Side:

### Custom Content Type: Room

Create a custom content type "Rooms". Labels should be defined so that the administrator can easily understand what they are adding/modifying/deleting.

A room should have the following information:

- Presentation image (via the WordPress featured image)
- Name (post_title field)
- Summary (also called excerpt)
- Detailed content (post_content)
- An ACF field to define the number of beds
- An ACF field to define the indicative price

Rooms should be able to be organized according to two types of classifications:

- Type of beds (single, double)
- Price range

The ACF fields must be defined in PHP code.

## Public Site Side:

### Home Page

Plan a home page (CMS type page) displaying the following elements:

- A free content area with a quick presentation of the guest room.
- Section that lists the photos of the rooms, in large size (2 columns) (either in the form of a listing or via a slideshow). Under this block, put a link to access the room listing page (archive of the post type)
- An area for making contact (address / phone number)

Plan a main navigation with:

- Home page link
- Link to the room archive page
- A link to a CMS page "Contact us"

### Room Archive Page

Plan the listing of rooms. The information to display is as follows:

- Cover image
- Title
- Summary
- Beds
- Price range
- Access button to the article

A filter area should allow filtering the results on the defined ACF fields.

### "Singular" Page Dedicated to a Room

#### Main Content

Design the article template. The page should present the following information:

- Title
- Main photo
- Detailed content
- ACF fields filled in admin
- Categories (Type of bed and range)

#### Related Rooms

Create a block to propose other rooms of the same "Price range" classification.

### Bonus Exercise:

Create a visit counter on a Room page to know which one is the most popular with visitors. This data should only appear in the site administration.

Hint: use the 'wp' type action hook and check the content type. If the content type corresponds to a "Room" type, then use the methods to retrieve/update metadata.

## Deliverables:

- Necessary source code: /wp-content/ folder
- Export of the BDD in .sql format
- Used URL (recommended: http://localhost)
- Make sure the uploads folder is present for images

For the format, Git repositories and zip archives are accepted.