package Controlador;

import com.mysql.jdbc.PreparedStatement;

/**
 *
 * @author kevin
 */
public class registrarVehiculo extends Conexion {
     public boolean registrarv(String marca, String modelo, double precio, String motor, String rines, String clase, String version, String tipo, 
             String cilindrada, int NIV, String pais, String NCI, String color){
      PreparedStatement pst=null;
      
      try{
        String consulta="insert into vehiculo values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          pst=(PreparedStatement) getconexionn().prepareStatement(consulta);
        
          
          pst.setString(1,marca);
          pst.setString(2, modelo);
          pst.setDouble(3, precio);
          pst.setString(4, motor);
          pst.setString(5, rines);
          pst.setString(6, clase);
          pst.setString(7, version);
          pst.setString(8, tipo);
           pst.setString(9, cilindrada);
           pst.setInt(10, NIV);
            pst.setString(11, pais);
             pst.setString(12, NCI);
              pst.setString(13,color);
              pst.setString(14, "0");
     
         
            
        
         
          if (pst.executeUpdate()==1) {
              return true;
          }  
      }catch(Exception e){
          System.out.println("error:"+e);
      }finally{
        try{
              if (getconexionn()!=null)getconexionn().close();
                if(pst!=null)pst.close();;
        }catch(Exception e){
            
        }
      }
      return false;
  }
}
