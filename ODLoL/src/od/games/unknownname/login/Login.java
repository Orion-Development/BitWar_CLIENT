package od.games.unknownname.login;

import java.sql.ResultSet;
import java.sql.SQLException;


public class Login {
    
    String host, port, user, pass, database, username, password, table;
    MySQL mysql;
    
    public Login(MySQL mysql, String table, String username, String password) {
        this.mysql = mysql;
        this.password = password;
        this.username = username;
    }
    
    public boolean validate() {
        try {
            ResultSet rs = mysql.query("COUNT (*) FROM "+table+" WHERE username='"+username+"' AND password='"+password+"'");
            rs.next();
            if (rs.getInt(1) == 1) {
                return true;
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return false;
    }

}
