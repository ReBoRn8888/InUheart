package com.example.inuheart;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Looper;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import java.sql.Connection;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import dataBaseService.DbAccessManger;

/**
 * Created by 建超 on 2017/3/2.
 */
public class AppointActivity extends Activity{

    private SimpleAdapter adapter;
    private ArrayList<HashMap<String, Object>> InfList = new ArrayList<HashMap<String, Object>>();
    private ListView list;
    private Toolbar toolbar;
    private TextView toolbar_title;
    private ImageButton back;
    private ProgressDialog pDialog;
    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.list);
        sharedPreferences= getSharedPreferences("test",
                Activity.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        toolbar = (Toolbar)findViewById(R.id.toolbar);
        toolbar_title = (TextView) toolbar.findViewById(R.id.toolbar_title);
        list = (ListView)findViewById(R.id.list);
        back = (ImageButton)findViewById(R.id.back);

        final Bundle b = getIntent().getExtras();
        String judge = b.getString("judge");
        switch (judge){
            case "按心理咨询师预约":
                toolbar_title.setText(judge);
                pDialog = new ProgressDialog(AppointActivity.this);
                pDialog.setMessage("加载中……");
                pDialog.setIndeterminate(false);
                pDialog.setCancelable(true);
                pDialog.show();
                new Thread() {
                    public void run() {
                        String teacher = b.getString("teacher");
                        String sql = "select * from appointment where teacher='"+teacher+"' and available=1";
                        List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
                        pDialog.dismiss();
                        int i = check.size();
                        if(i>0){
                            while(i > 0)
                            {
                                runOnUiThread(new Runnable() {
                                    public void run() {
                                        adapter = new SimpleAdapter(AppointActivity.this,
                                                InfList,
                                                R.layout.appointment_info,
                                                new String[]{"appointid", "name", "room", "date", "time"},
                                                new int[]{R.id.appointid,R.id.name,R.id.room,R.id.date,R.id.time});
                                        list.setAdapter(adapter);
                                    }
                                });
                                HashMap<String, Object> map = new HashMap<String, Object>();
                                map.put("name", check.get(i - 1)[1]);
                                map.put("room", check.get(i - 1)[2]);
                                map.put("date", check.get(i - 1)[3]);
                                map.put("time", check.get(i - 1)[4]);
                                map.put("appointid", check.get(i - 1)[0]);
                                Log.v("info",check.get(i - 1)[0] + " " + check.get(i - 1)[1] + " " + check.get(i - 1)[2] + " " + check.get(i - 1)[3] + " " + check.get(i - 1)[4] + " ");
                                InfList.add(map);
                                i--;
                            }
                        }
                        else{
                            Looper.prepare();
                            Toast.makeText(AppointActivity.this, "很遗憾，这个时间点没有空闲的心理咨询师", Toast.LENGTH_LONG).show();
                            Looper.loop();
                        }
                    };
                }.start();
                break;
            case "按时间预约":
                toolbar_title.setText(judge);
                pDialog = new ProgressDialog(AppointActivity.this);
                pDialog.setMessage("加载中……");
                pDialog.setIndeterminate(false);
                pDialog.setCancelable(true);
                pDialog.show();
                new Thread() {
                    public void run() {
                        String date = b.getString("date");
                        String sql = "select * from appointment where date='"+date+"' and available=1";
                        List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
                        pDialog.dismiss();
                        int i = check.size();
                        if(i>0){
                            while(i > 0)
                            {
                                runOnUiThread(new Runnable() {
                                    public void run() {
                                        adapter = new SimpleAdapter(AppointActivity.this,
                                                InfList,
                                                R.layout.appointment_info,
                                                new String[]{"appointid", "name", "room", "date", "time"},
                                                new int[]{R.id.appointid,R.id.name,R.id.room,R.id.date,R.id.time});
                                        list.setAdapter(adapter);
                                    }
                                });
                                HashMap<String, Object> map = new HashMap<String, Object>();
                                map.put("name", check.get(i - 1)[1]);
                                map.put("room", check.get(i - 1)[2]);
                                map.put("date", check.get(i - 1)[3]);
                                map.put("time", check.get(i - 1)[4]);
                                map.put("appointid", check.get(i - 1)[0]);
                                Log.v("info",check.get(i - 1)[0] + " " + check.get(i - 1)[1] + " " + check.get(i - 1)[2] + " " + check.get(i - 1)[3] + " " + check.get(i - 1)[4] + " ");
                                InfList.add(map);
                                i--;
                            }
                        }
                        else{
                            Looper.prepare();
                            Toast.makeText(AppointActivity.this, "很遗憾，这个时间点没有空闲的心理咨询师", Toast.LENGTH_LONG).show();
                            Looper.loop();
                        }
                    };
                }.start();
                break;
        }
        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    public void appoint(final View v){
        LinearLayout layout = (LinearLayout) v.getParent();
        TextView infotext = (TextView)layout.findViewById(R.id.infotext);
        final EditText infoedit = (EditText)layout.findViewById(R.id.infoedit);
        Button btn = (Button)layout.findViewById(R.id.submitbtn);
        //显示留言板块
        infotext.setVisibility(View.VISIBLE);
        infoedit.setVisibility(View.VISIBLE);
        btn.setVisibility(View.VISIBLE);
        //自动获取焦点
        infoedit.setFocusable(true);
        infoedit.setFocusableInTouchMode(true);
        infoedit.requestFocus();

        TextView appoint=(TextView)layout.findViewById(R.id.appointid);
        final String appointid = appoint.getText().toString();
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String info = infoedit.getText().toString();
                Log.v("info","info=" + info + " appointid= " + appointid);
                pDialog = new ProgressDialog(AppointActivity.this);
                pDialog.setMessage("预约中……");
                pDialog.setIndeterminate(false);
                pDialog.setCancelable(true);
                pDialog.show();
                new Thread()  {
                    public void run() {
                        String userid = sharedPreferences.getString("userid", "");

                        Log.v("info: ",appointid + " " + userid + " " + info);

                        String sqlcheck = "select * from appoint_result where UserID = '"+userid+"' and AppointID = '"+appointid+"'";
                        List<String[]> c = DbAccessManger.getInstance().ExecSql(sqlcheck);
                        pDialog.dismiss();
                        if(c.size()>0){
                            Looper.prepare();
                            Toast.makeText(AppointActivity.this, "您已经有这个时间段的预约了，请选择其他预约~", Toast.LENGTH_LONG).show();
                            Looper.loop();
                        }
                        else{
                            String sql = "insert into appoint_result(UserID,AppointID,Information) values('"+userid+"','"+appointid+"','"+info+"')";
                            String check = DbAccessManger.getInstance().ExecNoSelectSql(sql,true);
                            if(check.isEmpty()){
                                Looper.prepare();
                                Toast.makeText(AppointActivity.this, "预约成功", Toast.LENGTH_LONG).show();
                                Looper.loop();
                            }
                            else{
                                Looper.prepare();
                                Toast.makeText(AppointActivity.this, "很遗憾，这个时间点没有空闲的心理咨询师", Toast.LENGTH_LONG).show();
                                Looper.loop();
                            }
                        }
                    };
                }.start();
            }
        });
    }
}
