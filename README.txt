// VEGAMATIC TODO: HTML Dateselector for Weekstamp

an amount may only exist once in a week; it's eithter

- amount->exclude = 1
- amount->quantity = new quantity
- amount->deleted => included
- amount->undeleted => depends (either exclude or new quantity)

make sure that all amount related actions call

processAmountAction() first => checks if

- amount->getGoods->getUid() already exists in shoppingList
- amount is among the deleted

this action then forwards either to 

- createAmount
- updateAmount
- deleteAmount

So its:

addAmount => processAmount => crud
modifyAmount => processAmount => crud
excludeAmount => processAmount => crud
includeAmount => processAmount => crud


#####

Make a grid with 14 slots => 2 slots for each day