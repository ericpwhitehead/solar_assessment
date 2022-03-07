**Completed by:** Eric Whitehead

**Time Spent:** ~5 hours

**Summary:** It has been a while since I built anything with a
PHP framework. I did spend a fair amount of time checking
the laravel docs but it didn't take long to feel comfortable
again. I have not been very involved in the php communnities
but was impressed with the size and activity - tons of great
resources out there.

**Missing functionality:** Multiple items (you can only input a single list item), some edit functionality

### Objective

Your challenge is to build out the frontend and backend components of an invoicing application for SolarReviews.com's accounting department.

### Brief

Your task is to build out the project to the design files provided in the `/designs` folder. The functionality outlined in **Expected Behaviour** is more important than implementing the designs pixel-perfect. You are only supposed to build out the desktop version of the assignment and it does not need to be responsive.

`I did not spend a lot of time on the style/design. I did implement tailwind css so it is mostly responsive`

All the required assets for this project are in the `/assets` folder. The assets are already exported for the correct screen size and optimized.

The design system file will give you more information about the various colors, fonts, and styles used in this project.

We provide example data in a local `data.json` file, you may use it to seed your database with initial data.

`I did not import the sample data but instead only put my own test data in as I built it out.`

### Tasks

Your users should be able to:

-   Create, read, update, and delete invoices
    -   Create corresponding API endpoints
        `all endpoints created although I didn't explictly create a read endpoint`
    -   No authentication/session management is required. Imagine you're building this application for a single user (yourself)
        `I did implement authentication although functionality is not prevented. I wanted to know the laravel way of authentication (they make it very easy)`
-   **Bonus**: Receive form validations when trying to create/edit an invoice
    `I only did very basic required auth on a single field. Simple to add additional but I didn't know how specific to validate (plus less validation made testing easier)`
-   **Bonus**: Save draft invoices, and mark pending invoices as paid
    `No validation on save draft`
-   **Bonus**: Filter invoices by status (draft/pending/paid)
    `Implemented through javascript`
-   **Bonus**: Keep track of any changes, even after refreshing the browser (`localStorage` could be used for this)
    `Not fully implemented but I did leverage the old input functionality (https://laravel.com/docs/8.x/requests#old-input)`

### Expected Behaviour

-   Creating an invoice
    -   When creating a new invoice, an ID needs to be created. Each ID should be 2 random uppercased letters followed by 4 random numbers.
    -   Invoices can be created either as drafts or as pending. Clicking "Save as Draft" should allow the user to leave any form field blank, but should create an ID if one doesn't exist and set the status to "draft". Clicking "Save & Send" should require all forms fields to be filled in, and should set the status to "pending".
    -   Changing the Payments Terms field should set the `paymentDue` property based on the `createdAt` date plus the numbers of days set for the payment terms.
    -   The `total` should be the sum of all items on the invoice.
-   Editing an invoice
    -   When saving changes to an invoice, all fields are required when the "Save Changes" button is clicked. If the user clicks "Cancel", any unsaved changes should be reset.
    -   If the invoice being edited is a "draft", the status needs to be updated to "pending" when the "Save Changes" button is clicked. All fields are required at this stage.
-   Users should be able to mark invoices as paid by clicking the "Mark as Paid" button. This should change the invoice's status to "paid".
-   Feel free not to add custom styling for the date and dropdown form fields. The designs for those fields are optional extras and are mostly for illustration purposes.

### Evaluation Criteria

-   Show us your work through your commit history
-   We're looking for you to produce working code, with enough room to demonstrate how to structure components in a small program
-   Completeness: did you complete the features?
-   Correctness: does the functionality act in sensible, thought-out ways?
-   Maintainability: is it written in a clean, maintainable way?
-   Testing: is the system adequately tested?

### CodeSubmit

Please organize, design, test, and document your code as if it were going into production - then push your changes to the master branch. After you have pushed your code, you may submit the assignment on the assignment page.

**Have fun building!** 🚀

The SolarReviews.com Team
