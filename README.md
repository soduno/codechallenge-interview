<h1>Eindom Backend task</h1>

<p>
    Thanks for the specific task regarding creating a minor REST API. <br />
    I have made it simple, since It was my best understanding of the task to keep it simple.
</p>

<p>
    All of the endpoints returns data in JSON format. <br />
    This is the following endpoints added:
</p>


<table>
    <tr>
        <th>REQUEST</th>
        <th>ROUTE</th>
        <th>BODY PARAM(S)</th>
        <th>DESCRIPTION</th>
    </tr>
    <tr>
        <td>GET</td>
        <td>http://eindom-task.test/api/accounts</td>
        <td></td>
        <td>List all accounts</td>
    </tr>
    <tr>
        <td>POST</td>
        <td>http://eindom-task.test/api/account</td>
        <td>name</td>
        <td>Create a new account</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>http://eindom-task.test/api/account/{accountId}/transactions</td>
        <td></td>
        <td>Get all transactions based on the ID of the account.</td>
    </tr>
    <tr>
        <td>POST</td>
        <td>http://eindom-task.test/api/account/{accountId}/transaction</td>
        <td>description,amount</td>
        <td>Create a new transaction</td>
    </tr>
</table>
