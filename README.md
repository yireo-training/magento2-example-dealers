# Magento 2 example of a MVC module
This module demonstrates the usage of MVC within a module, through the concept of having dealer entries in the frontend:

## Technical layout
- Module `Yireo_ExampleDealers`
    - API repository interface
    - API model interface
    - Repository class
    - Model class
    - ResourceModel class
    - Collection class
- Module `Yireo_ExampleDealersFrontend`
    - Controllers & routing
    - ViewModel
    - XML layout
    - PHTML templating
- Module `Yireo_ExampleDealersAdminhtml` (@todo)
    - UiComponent grid
    - UiComponent form
- Module `Yireo_ExampleDealersGraphql` (@todo)
    - GraphQL resource
    - Dummy React component
- Module `Yireo_ExampleDealersCqrs` (@todo)
    - Replacement repository with Queries and Commands
    
## Specific notes
- The repository has more methods than a regular repository, to help other developers accomplish specific tasks quicker: `getAll()`, `getItems()`, `getSearchCriteriaBuilder()`;
- A `DealerSearchCriteriaBuilder` that has knowledge of the database structure, without requiring you to have that same knowledge;
- No more Blocks, because ViewModels are cooler;
- No more Setup-scripts, because `db_schema.xml` is easier;

