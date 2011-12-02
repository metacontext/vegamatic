// VEGAMATIC TODO: HTML Dateselector for Weekstamp
// VEGAMATIC TODO: Possibility to change shop when modifying an amount - will change the shop for the related goods in DB


	<div class="twelve columns">

		<h2>Woche {week.weekstamp -> f:format.date()}</h2>
		<p><f:link.action action="list">Back to list</f:link.action></p>
		
		<dl class="tabs contained">
			<dd><a href="#simpleContained1" class="active">Shopping List</a></dd>
			<dd><a href="#simpleContained2">Dish Selection</a></dd>
		</dl>
		
		<ul class="tabs-content contained">
			<li class="active" id="simpleContained1Tab">
				<f:render partial="Weeks/ShoppingList" arguments="{_all}" />
			</li>
			<li id="simpleContained2Tab">
				<f:render partial="Weeks/DishSelection" arguments="{_all}" />						
			</li>
		</ul>					
	</div>
	
<f:form.errors>
	<div class="error">
		{error.message}
		<f:if condition="{error.propertyName}">
			<p>
				<strong>{error.propertyName}</strong>:
				<f:for each="{error.errors}" as="errorDetail">
					{errorDetail.message}
				</f:for>
			</p>
		</f:if>
	</div>
</f:form.errors>