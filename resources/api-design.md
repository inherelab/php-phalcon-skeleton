# 社交版开发设计-用户扩展信息模块

[TOC]

用户扩展信息模块

## 聊天

- 与模特一对一聊天(文字、视频)
- 系统通知
- 用户评价
- 用户反馈

### 聊天通话

#### 接口API列表

- 历史聊天用户列表
- 未接的通话列表
- 已接的通话列表
- 历史消息记录
- 目标用户状态
- 标记开始发消息
- 提示消息（一些情景提示消息）
- 会话状态
  - 用户是否在会话中，已结束 ...
- 用户在线状态(离线，在线...)
- 模特接听率
- 模特累计接单

#### DB table

- 聊天记录 `ChatHistory`

列名 | 类型 | 含义 | 其他
----|-----|-----|--------------
iId | int(11) |  主键 | -
iType | int(2) | 类型 | 文本，音频，短视频
iStatus | int(2) | 状态 | -
iSourceId | int(11) | 发起者ID | -
iTargetId | int(11) | 接收者ID | -
sContent | varchar | 聊天内容 | -
iCreateTime | int(10) | 记录时间 | -

> 标记 已读/未读 ？

- 通话/会话记录 `CallRecord`

列名 | 类型 | 含义 | 其他
-----|------|-----|--------------
iId | int(11) |  主键 | -
iSDKId | varchar(64) | SDK 通话 id |  
iLastId | int(11) | 上次会话记录ID。默认 0 | 上次未打通，重拨时
iStatus | int(2) | 状态 | -
iType | int(2) | 通话类型 | 文字/视频
iAssocId | int(11) | 关联ID | 文字聊天中，发起视频会话
iSourceId | int(11) | 发起者ID | -
iSourceRule | int(11) | 发起者角色 | 普通用户、模特
iTargetId | int(11) | 接收者ID | -
iTargetRule | int(11) | 接收者角色 | 普通用户、模特
iConnected | int(2) | 是否接通 | 仅对视频
iStartTime | int(10) | 通话开始时间 | -
iEndTime | int(10) | 通话结束时间 | -
iUnitPrice | int(10) | 通话单价 | 单位 尤果币/分钟
iExpense | int(10) | 本次通话总花费 | 消费（用户）/收入（模特）

- 视频通话截图记录 `VideoChatScreenshot`

列名 | 类型 | 含义 | 其他
-----|------|-----|--------------
iId | int(11) |  主键 | -
iChatId | int(11) | 通话记录ID | -
iSourceId | int(11) | 截图来源用户ID | -
sImage | varchar | 截图图片 | -
iCreateTime | int(10) | 记录时间 | -

> 发现违规后，如何操作？

## 消息(评价、通知、反馈)

### 系统通知

#### 接口API列表

- 消息列表
- 消息详情数据

#### DB table

- 系统通知 `systemNotification`

列名 | 类型 | 含义 | 其他
----|-----|-----|--------------
iId | int(11) |  主键 | -
iStatus | int(2) | 状态 | 是否启用
iSenderId | int(11) | 发送者ID | -
sReceiver | varchar | 接收者 | 一个用户/一组/一种角色/所有人
sImage | varchar| 消息标题图片 | -
sTitle | varchar| 消息标题 | -
sSubTitle | varchar| 消息附标题 | -
sContent | text | 内容 | -
iCreateTime | int(10) | 创建时间 | -
iSendTime | int(10) | 发送时间 | -

### 用户评价(模特)

#### 接口API列表

- 我的评价列表
- 评价过我的用户列表
- 我评价过的模特列表
- 模特好评率
- 发表评价
  - 标签最多可多选三个，最少选择一个标签 
- 删除评价

#### DB table

- 评价信息表 `Comment`

列名 | 类型 | 含义 | 其他
-----|-----|-----|-------
iId | int(11) |  主键 | - 
iChatId | int(11) | 通话记录ID | -
iUserId | int(11) | 用户ID | -
iTargetId | int(11) | 目标用户(模特)ID | -
iCreateTime | int(10) | 发表时间 | -

- 评价标签表 `commentTag`

列名 | 类型 | 含义 | 其他
-----|-----|-----|------
iId | int(11) |  主键 | -
sName | char | 标签名称 | -

- 评价与标签关系表 `commentToTag`

列名 | 类型 | 含义 | 其他
-----|-----|-----|------
iId | int(11) |  主键 | -
iCommentId | int(11) | 评价ID | -
iTagId | int(11) | 标签 ID | -

### 用户反馈

#### 接口API列表

- 反馈列表
- 用户的反馈列表(内部)
- 发布反馈 
- 删除反馈

#### DB table

- 评价信息表 `userFeedback`

列名 | 类型 | 含义 | 其他
-----|-----|-----|-------
iId | int(11) |  主键 | - 
iStatus | int(2) |  状态 | 1 未处理 5 已处理
iUserId | int(11) |  用户ID | - 
sTitle | varchar(128) |  反馈标题 | - 
sContent | varchar(128) |  反馈内容 | - 
sRemark | varchar(128) | 处理备注 | - 
iCreateTime | int(10) | 反馈时间 | -
iHandleTime | int(10) | 处理时间 | -

## 用户关注/粉丝

### API 列表

- 关注用户(允许多个用户ID)
- 取消关注(允许多个用户ID)
- 是否关注过（一个或多个）用户
- 我关注的用户列表
- 我的粉丝列表

## 模特

### 模特相册

一个模特含有一个视频相册和一个图片相册

#### 接口API列表

- 添加图片
- 删除图片
- 添加视频
- 删除视频

### 模特认证信息

#### 接口API列表

## 动态

- 模特动态
- 个人动态
- （我）关注的人动态

#### DB table

列名 | 类型 | 含义 | 其他
-----|-----|-----|------
iId | int(11) |  主键 | -
iType | int(2) | 类型 | 个人/模特/官方的 ...
sTitle | varchar | 动态标题 | -
sDescription | varchar | 动态描述 | -
iTargetId | int(11) | 动态来源ID | e.g 跳转至详情页
iMicroTime | int(16) | 动态发生时间(微妙) | -

... ...
