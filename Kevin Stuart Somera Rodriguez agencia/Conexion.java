/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controlador;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
     private String USERNAME="root";
    private String PASSWORD="";
    private String HOST="localhost";
    private String PORT="3306";
    private String DATABASE="agenciavehicu";
    private String CLASSNAME="com.mysql.jdbc.Driver";
    private String URL ="jdbc:mysql://"+HOST+":"+PORT+"/"+DATABASE;
   Connection cn;
    public Conexion() {
        try {
            Class.forName(CLASSNAME);
           cn=DriverManager.getConnection(URL, USERNAME, PASSWORD);
           
        }catch(ClassNotFoundException ex){
            System.out.println("1."+ex);
        }catch(SQLException e){
            System.out.println("2"+e);
        }
    }
public Connection getconexionn(){
 return cn;   
}

}
